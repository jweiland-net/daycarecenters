<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.' . $_EXTKEY,
    'Daycarecenters',
    [
        'Kita' => 'list, show, search',
        'Holder' => 'show'
    ],
    // non-cacheable actions
    [
        'Kita' => 'search'
    ]
);

// use hook to automatically add a map record to current daycarecenter
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \JWeiland\Daycarecenters\Tca\CreateMap::class;