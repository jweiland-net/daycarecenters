<?php

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.daycarecenters',
    'Daycarecenters',
    'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:plugin.title'
);
