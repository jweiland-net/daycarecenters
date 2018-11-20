<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'daycarecenters',
    'Configuration/TypoScript',
    'Day Care Centers'
);
