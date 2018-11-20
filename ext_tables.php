<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_daycarecenters_domain_model_kita',
    'EXT:daycarecenters/Resources/Private/Language/locallang_csh_tx_daycarecenters_domain_model_kita.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_daycarecenters_domain_model_holder',
    'EXT:daycarecenters/Resources/Private/Language/locallang_csh_tx_daycarecenters_domain_model_holder.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_daycarecenters_domain_model_careform',
    'EXT:daycarecenters/Resources/Private/Language/locallang_csh_tx_daycarecenters_domain_model_careform.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_daycarecenters_domain_model_district',
    'EXT:daycarecenters/Resources/Private/Language/locallang_csh_tx_daycarecenters_domain_model_district.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_daycarecenters_domain_model_telephone',
    'EXT:daycarecenters/Resources/Private/Language/locallang_csh_tx_daycarecenters_domain_model_telephone.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_daycarecenters_domain_model_kita');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_daycarecenters_domain_model_holder');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_daycarecenters_domain_model_careform');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_daycarecenters_domain_model_district');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_daycarecenters_domain_model_telephone');
