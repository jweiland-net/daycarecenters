<?php
declare(strict_types = 1);
namespace JWeiland\Daycarecenters\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
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
