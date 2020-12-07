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

call_user_func(function ($extKey) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'JWeiland.' . $extKey,
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

    /** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
    $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
    // update poiCollection record while saving kita records
    $signalSlotDispatcher->connect(
        \JWeiland\Maps2\Hook\CreateMaps2RecordHook::class,
        'postUpdatePoiCollection',
        \JWeiland\Daycarecenters\Hook\UpdateMaps2RecordHook::class,
        'postUpdatePoiCollection'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['daycarecentersHolderLogo']
        = \JWeiland\Daycarecenters\Updates\HolderLogoUpdateWizard::class;

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
}, 'daycarecenters');
