<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\ViewHelpers;

use JWeiland\Daycarecenters\Converter\TimeToStringConverter;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This ViewHelper converts seconds since midnight 0:00 to a readable format
 */
class TimeViewHelper extends AbstractViewHelper
{
    /**
     * This ViewHelper converts seconds since midnight 0:00 to a readable format
     *
     * @return string
     */
    public function render(): string
    {
        $timestamp = (int)$this->renderChildren();
        $converter = GeneralUtility::makeInstance(TimeToStringConverter::class);

        return $converter->convert($timestamp);
    }
}
