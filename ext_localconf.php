<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Daycarecenters',
        'Daycarecenters',
        [
            \JWeiland\Daycarecenters\Controller\KitaController::class => 'list, show, search',
            \JWeiland\Daycarecenters\Controller\HolderController::class => 'show',
        ],
        // non-cacheable actions
        [
            \JWeiland\Daycarecenters\Controller\KitaController::class => 'search',
        ]
    );

    // Add daycarecenters plugin to new element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:daycarecenters/Configuration/TSconfig/ContentElementWizard.tsconfig">'
    );
});
