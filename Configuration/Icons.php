<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

// Register SVG Icon Identifier
$svgIcons = [
    'ext-daycarecenters-careform' => 'careform.svg',
    'ext-daycarecenters-district' => 'district.svg',
    'ext-daycarecenters-holder' => 'holder.svg',
    'ext-daycarecenters-kita' => 'kita.svg',
    'ext-daycarecenters-telephone' => 'telephone.svg',
];

$configuredIcons = [];
foreach ($svgIcons as $identifier => $fileName) {
    $icons[$identifier] = [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/' . $fileName
    ];
}

return $configuredIcons;
