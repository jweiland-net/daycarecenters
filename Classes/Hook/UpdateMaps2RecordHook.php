<?php
declare(strict_types=1);
namespace JWeiland\Daycarecenters\Hook;

/*
 * This file is part of the daycarecenters project.
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
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Set default category, defined in extension configuration of daycarecenters, to POI collection records,
 * while saving kita records.
 */
class UpdateMaps2RecordHook
{
    /**
     * @var ExtConf
     */
    protected $extConf;

    /**
     * UpdateMaps2RecordHook constructor.
     *
     * @param ExtConf $extConf
     */
    public function __construct(ExtConf $extConf = null)
    {
        if ($extConf === null) {
            $extConf = GeneralUtility::makeInstance(ExtConf::class);
        }
        $this->extConf = $extConf;
    }

    /**
     * @param string $poiCollectionTableName
     * @param int $poiCollectionUid
     * @param string $foreignTableName
     * @param array $foreignLocationRecord
     * @param array $options
     */
    public function postUpdatePoiCollection(string $poiCollectionTableName, int $poiCollectionUid, string $foreignTableName, array $foreignLocationRecord, array $options)
    {
        if ($foreignTableName === 'tx_daycarecenters_domain_model_kita') {
            $connection = $this->getConnectionPool()->getConnectionForTable('sys_category_record_mm');

            // delete all existing category relations
            $connection->delete(
                'sys_category_record_mm',
                [
                    'uid_foreign' => $poiCollectionUid,
                    'tablenames' => 'tx_maps2_domain_model_poicollection'
                ]
            );

            // Create new category relation
            $connection->insert(
                'sys_category_record_mm',
                [
                    'uid_local' => $this->extConf->getDefaultMaps2Category(),
                    'uid_foreign' => $poiCollectionUid,
                    'fieldname' => 'categories',
                    'tablenames' => 'tx_maps2_domain_model_poicollection',
                    'sorting' => 1
                ]
            );

            // update amount of category relations
            $connection->update(
                'tx_maps2_domain_model_poicollection',
                [
                    'categories' => 1
                ],
                [
                    'uid' => $poiCollectionUid
                ]
            );
        }
    }

    /**
     * Get TYPO3s Connection Pool
     *
     * @return ConnectionPool
     */
    protected function getConnectionPool()
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
