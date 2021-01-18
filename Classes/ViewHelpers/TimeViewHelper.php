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
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * This ViewHelper converts seconds since midnight to a readable format 0:00
 */
class TimeViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $timestamp = (int)$renderChildrenClosure();
        $converter = GeneralUtility::makeInstance(TimeToStringConverter::class);

        return $converter->convert($timestamp);
    }
}
