<?php
if (!defined('TYPO3_MODE')) {
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

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['daycarecentersHolderLogo']
        = \JWeiland\Daycarecenters\Updates\HolderLogoUpdateWizard::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['daycarecentersUpdateSlug']
        = \JWeiland\Daycarecenters\Updates\SlugUpdateWizard::class;

    // Register SVG Icon Identifier
    $svgIcons = [
        'ext-daycarecenters-careform' => 'careform.svg',
        'ext-daycarecenters-district' => 'district.svg',
        'ext-daycarecenters-holder' => 'holder.svg',
        'ext-daycarecenters-kita' => 'kita.svg',
        'ext-daycarecenters-telephone' => 'telephone.svg',
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($svgIcons as $identifier => $fileName) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:daycarecenters/Resources/Public/Icons/' . $fileName]
        );
    }
});
