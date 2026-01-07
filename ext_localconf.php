<?php

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Daycarecenters\Controller\HolderController;
use JWeiland\Daycarecenters\Controller\KitaController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

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
