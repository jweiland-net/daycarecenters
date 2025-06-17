<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'Daycarecenters',
    'Daycarecenters',
    'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:plugin.daycarecenters.title'
);
