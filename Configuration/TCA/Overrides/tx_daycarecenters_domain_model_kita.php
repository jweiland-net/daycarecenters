<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Add tx_maps2_uid column to kita table
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
    \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
        'daycarecenters',
        'tx_daycarecenters_domain_model_kita',
        [
            'addressColumns' => ['street', 'house_number', 'zip', 'city'],
            'defaultCountry' => 'Deutschland',
            'defaultStoragePid' => [
                'extKey' => 'daycarecenters',
                'property' => 'poiCollectionPid'
            ],
            'synchronizeColumns' => [
                [
                    'foreignColumnName' => 'title',
                    'poiCollectionColumnName' => 'title'
                ]
            ]
        ]
    );
}
