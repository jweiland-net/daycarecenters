<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\EventListener;

use JWeiland\Daycarecenters\Configuration\ExtConf;
use JWeiland\Maps2\Event\PostProcessPoiCollectionRecordEvent;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Register paginator to paginate through the company records in frontend
 */
class SetDefaultCategoryToPOIEventListener
{
    protected ExtConf $extConf;

    public function __construct(ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    public function __invoke(PostProcessPoiCollectionRecordEvent $event): void
    {
        if ($event->getForeignTableName() === 'tx_daycarecenters_domain_model_kita') {
            $connection = $this->getConnectionPool()->getConnectionForTable('sys_category_record_mm');

            // delete all existing category relations
            $connection->delete(
                'sys_category_record_mm',
                [
                    'uid_foreign' => $event->getPoiCollectionUid(),
                    'tablenames' => 'tx_maps2_domain_model_poicollection',
                ]
            );

            // Create new category relation
            $connection->insert(
                'sys_category_record_mm',
                [
                    'uid_local' => $this->extConf->getDefaultMaps2Category(),
                    'uid_foreign' => $event->getPoiCollectionUid(),
                    'fieldname' => 'categories',
                    'tablenames' => 'tx_maps2_domain_model_poicollection',
                    'sorting' => 1,
                ]
            );

            // update amount of category relations
            $connection->update(
                'tx_maps2_domain_model_poicollection',
                [
                    'categories' => 1,
                ],
                [
                    'uid' => $event->getPoiCollectionUid(),
                ]
            );
        }
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
