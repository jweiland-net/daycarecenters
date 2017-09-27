<?php
declare(strict_types=1);
namespace JWeiland\Daycarecenters\Converter;

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

/**
 * Class TimeToStringConverter
 *
 * @package JWeiland\Daycarecenters\Converter
 */
class TimeToStringConverter
{
    /**
     * a method to convert a timestamp to a readable time format like: 21:35
     *
     * @param int $timestamp Timestamp to convert
     * @return string
     */
    public function convert(int $timestamp)
    {
        if (empty($timestamp)) {
            return '00:00';
        }
        $hours = $this->getHours($timestamp);
        $minutes = $this->getRemainingMinutes($timestamp, (int)$hours);

        return str_pad((string)$hours, 2, '0', STR_PAD_LEFT)
            . ':'
            . str_pad((string)$minutes, 2, '0', STR_PAD_LEFT);
    }

    /**
     * this method rounds down (integer) the contained hours in $time
     *
     * @param int $time
     * @return float
     */
    protected function getHours(int $time)
    {
        return floor($time / 3600);
    }

    /**
     * Extracts the minutes from $time
     * Example:
     * 33.300 Seconds / 3.600 = 9,25 hours
     * 9 * 3.600 = 32.400
     * 33.300 - 32.400 = 900 seconds remaining
     * 900 / 60 = 15 minutes
     *
     * @param int $time seconds since midnight
     * @param int $hours
     * @return integer remaining minutes
     */
    protected function getRemainingMinutes(int $time, int $hours)
    {
        $minutes = 0;

        $seconds = $time % ($hours * 3600);
        if ($seconds) {
            $minutes = ceil($seconds / 60);
        }

        return $minutes;
    }
}
