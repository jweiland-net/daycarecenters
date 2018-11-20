<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.daycarecenters',
    'Daycarecenters',
    'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:plugin.title'
);
