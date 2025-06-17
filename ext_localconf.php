<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use JWeiland\Daycarecenters\Controller\KitaController;
use JWeiland\Daycarecenters\Controller\HolderController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    ExtensionUtility::configurePlugin(
        'Daycarecenters',
        'Daycarecenters',
        [
            KitaController::class => 'list, show, search',
            HolderController::class => 'show',
        ],
        // non-cacheable actions
        [
            KitaController::class => 'search',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );
});
