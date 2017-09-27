<?php
declare(strict_types=1);
namespace JWeiland\Daycarecenters\Tca;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use JWeiland\Daycarecenters\Configuration\ExtConf;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Class CreateMap
 *
 * @package JWeiland\Daycarecenters\Tca
 */
class CreateMap
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var ExtConf
     */
    protected $extConf;

    /**
     * @var array
     */
    protected $currentRecord = [];

    /**
     * try to find a similar poiCollection. If found connect it with current record
     *
     * @param string $status "new" od something else to update the record
     * @param string $table The table name
     * @param integer $uid The UID of the new or updated record. Can be prepended with NEW if record is new. Use:
     *     $this->substNEWwithIDs to convert
     * @param array $fieldArray The fields of the current record
     * @param DataHandler $pObj
     * @return void
     */
    public function processDatamap_afterDatabaseOperations(
        $status,
        $table,
        $uid,
        array $fieldArray,
        DataHandler $pObj
    ) {
        // process this hook only on expected table
        if ($table !== 'tx_daycarecenters_domain_model_kita') {
            return;
        }
        $this->init();
        if ($status === 'new') {
            $uid = current($pObj->substNEWwithIDs);
        }
        $this->currentRecord = $this->getFullRecord($table, $uid);
        if ($this->currentRecord['tx_maps2_uid']) {
            // sync categories
            $this->updateMmEntries();
        } else {
            // create new map-record and set them in relation
            $jSon = GeneralUtility::getUrl(
                'http://maps.googleapis.com/maps/api/geocode/json?address=' . $this->getAddress() . '&sensor=false'
            );
            $response = json_decode($jSon, true);
            if (is_array($response) && $response['status'] === 'OK') {
                $location = $response['results'][0]['geometry']['location'];
                $address = $response['results'][0]['formatted_address'];
                $poiUid = $this->createNewPoiCollection($location, $address);
                $this->updateCurrentRecord($poiUid);
                // sync categories
                $this->updateMmEntries();
            }
        }
    }

    /**
     * initializes this object
     */
    public function init()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->extConf = $this->objectManager->get(ExtConf::class);
    }

    /**
     * get full daycarecenters record
     * While updating a record only the changed fields will be in $fieldArray
     *
     * @param string $table
     * @param integer $uid
     * @return array
     */
    public function getFullRecord($table, $uid)
    {
        return BackendUtility::getRecord($table, $uid);
    }

    /**
     * update mm table for poiCollections
     *
     * @return void
     */
    public function updateMmEntries()
    {
        // delete all with poiCollection related categories
        $GLOBALS['TYPO3_DB']->exec_DELETEquery(
            'sys_category_record_mm',
            'uid_foreign=' . (int)$this->currentRecord['tx_maps2_uid'] . ' AND tablenames="tx_maps2_domain_model_poicollection"'
        );
        $fieldValues = [];
        $fieldValues['uid_local'] = $this->extConf->getDefaultMaps2Category();
        $fieldValues['uid_foreign'] = (int)$this->currentRecord['tx_maps2_uid'];
        $fieldValues['tablenames'] = 'tx_maps2_domain_model_poicollection';
        $fieldValues['sorting'] = 1;
        $GLOBALS['TYPO3_DB']->exec_INSERTquery(
            'sys_category_record_mm',
            $fieldValues
        );
        // update field categories of maps2-record (amount of relations)
        $GLOBALS['TYPO3_DB']->exec_UPDATEquery(
            'tx_maps2_domain_model_poicollection',
            'uid=' . (int)$this->currentRecord['tx_maps2_uid'],
            ['categories' => 1]
        );
    }

    /**
     * get address for google search
     *
     * @return string Prepared address for URI
     */
    public function getAddress()
    {
        $address = [];
        $address[] = $this->currentRecord['street'];
        $address[] = $this->currentRecord['house_number'];
        $address[] = $this->currentRecord['zip'];
        $address[] = $this->currentRecord['city'];
        $address[] = 'Deutschland';

        return rawurlencode(implode(' ', $address));
    }

    /**
     * creates a new poiCollection before updating the current daycarecenter record
     *
     * @param array $location
     * @param string $address Formatted Address returned from Google
     * @return int insert UID
     */
    public function createNewPoiCollection(array $location, $address)
    {
        $tsConfig = $this->getTsConfig();
        $fieldValues = [];
        $fieldValues['pid'] = (int)$tsConfig['pid'];
        $fieldValues['tstamp'] = time();
        $fieldValues['crdate'] = time();
        $fieldValues['cruser_id'] = $GLOBALS['BE_USER']->user['uid'];
        $fieldValues['hidden'] = 0;
        $fieldValues['deleted'] = 0;
        $fieldValues['latitude'] = $location['lat'];
        $fieldValues['longitude'] = $location['lng'];
        $fieldValues['collection_type'] = 'Point';
        $fieldValues['title'] = $this->currentRecord['title'];
        $fieldValues['address'] = $address;
        $GLOBALS['TYPO3_DB']->exec_INSERTquery(
            'tx_maps2_domain_model_poicollection',
            $fieldValues
        );

        return $GLOBALS['TYPO3_DB']->sql_insert_id();
    }

    /**
     * get TSconfig
     *
     * @return array
     * @throws \Exception
     */
    public function getTsConfig()
    {
        $tsConfig = BackendUtility::getModTSconfig($this->currentRecord['uid'], 'ext.daycarecenters');
        if (is_array($tsConfig) && isset($tsConfig['properties']['pid'])) {
            return $tsConfig['properties'];
        }
        throw new \Exception(
            'no PID for maps2 given. Please add this PID in extension configuration of daycarecenters or set it in page TSconfig',
            1364889195
        );
    }

    /**
     * update address record
     *
     * @param integer $poi
     * @return void
     */
    public function updateCurrentRecord($poi)
    {
        $GLOBALS['TYPO3_DB']->exec_UPDATEquery(
            'tx_daycarecenters_domain_model_kita',
            'uid=' . $this->currentRecord['uid'],
            ['tx_maps2_uid' => $poi]
        );
        $this->currentRecord['tx_maps2_uid'] = $poi;
    }

    /**
     * try to find a similar poiCollection
     *
     * @param array $location
     * @return int The UID of the PoiCollection. 0 if not found
     */
    public function findPoiByLocation(array $location)
    {
        /** @var array $poi */
        $poi = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow(
            'uid',
            'tx_maps2_domain_model_poicollection',
            'latitude=' . $location['lat'] . ' AND longitude=' . $location['lng'] . BackendUtility::BEenableFields(
                'tx_maps2_domain_model_poicollection'
            ) . BackendUtility::deleteClause('tx_maps2_domain_model_poicollection')
        );
        if ($poi) {
            return $poi['uid'];
        }

        return 0;
    }
}
