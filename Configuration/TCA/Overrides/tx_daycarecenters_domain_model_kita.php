<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use JWeiland\Maps2\Tca\Maps2Registry;

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

// Add tx_maps2_uid column to kita table
if (ExtensionManagementUtility::isLoaded('maps2')) {
    Maps2Registry::getInstance()->add(
        'daycarecenters',
        'tx_daycarecenters_domain_model_kita',
        [
            'addressColumns' => ['street', 'house_number', 'zip', 'city'],
            'defaultCountry' => 'Deutschland',
            'defaultStoragePid' => [
                'extKey' => 'daycarecenters',
                'property' => 'poiCollectionPid',
            ],
            'synchronizeColumns' => [
                [
                    'foreignColumnName' => 'title',
                    'poiCollectionColumnName' => 'title',
                ],
            ],
        ],
    );
}
