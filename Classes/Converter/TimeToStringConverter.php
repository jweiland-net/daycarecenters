<?php
declare(strict_types = 1);
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
 * Helper class to convert a timestamp into a human readable time format
 */
class TimeToStringConverter
{
    /**
     * A method to convert a timestamp to a readable time format like: 21:35
     *
     * @param int $timestamp Timestamp to convert
     * @return string
     */
    public function convert(int $timestamp): string
    {
        if (empty($timestamp)) {
            return '00:00';
        }
        $hours = $this->getHours($timestamp);
        $minutes = $this->getRemainingMinutes($timestamp, $hours);

        return str_pad((string)$hours, 2, '0', STR_PAD_LEFT)
            . ':'
            . str_pad((string)$minutes, 2, '0', STR_PAD_LEFT);
    }

    /**
     * This method rounds down (int) the contained hours in $time
     *
     * @param int $time
     * @return int
     */
    protected function getHours(int $time): int
    {
        return (int)floor($time / 3600);
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
     * @return int remaining minutes
     */
    protected function getRemainingMinutes(int $time, int $hours): int
    {
        $minutes = 0;

        $seconds = $time % ($hours * 3600);
        if ($seconds) {
            $minutes = (int)ceil($seconds / 60);
        }

        return $minutes;
    }
}
