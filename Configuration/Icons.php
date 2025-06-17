<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/clubdirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'ext-daycarecenters' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/Extension.svg',
    ],
    'ext-daycarecenters-careform' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/careform.svg',
    ],
    'ext-daycarecenters-district' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/district.svg',
    ],
    'ext-daycarecenters-holder' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/holder.svg',
    ],
    'ext-daycarecenters-kita' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/kita.svg',
    ],
    'ext-daycarecenters-telephone' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:daycarecenters/Resources/Public/Icons/telephone.svg',
    ],
];
