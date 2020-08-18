<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Hook;

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
     * @param ExtConf|null $extConf
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
    public function postUpdatePoiCollection(string $poiCollectionTableName, int $poiCollectionUid, string $foreignTableName, array $foreignLocationRecord, array $options): void
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

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
