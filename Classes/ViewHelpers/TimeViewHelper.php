<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/clubdirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\ViewHelpers;

use JWeiland\Daycarecenters\Converter\TimeToStringConverter;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This ViewHelper converts seconds since midnight to a readable format 0:00
 */
class TimeViewHelper extends AbstractViewHelper
{
    public function render()
    {
        return self::getTimeToStringConverter()->convert((int)$this->renderChildrenClosure());
    }

    private static function getTimeToStringConverter(): TimeToStringConverter
    {
        return GeneralUtility::makeInstance(TimeToStringConverter::class);
    }
}
