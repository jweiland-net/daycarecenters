<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Controller;

use JWeiland\Daycarecenters\Domain\Repository\KitaRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Abstract controller with useful methods for all other controllers
 */
class AbstractController extends ActionController
{
    /**
     * @var KitaRepository
     */
    protected $kitaRepository;

    public function injectKitaRepository(KitaRepository $kitaRepository): void
    {
        $this->kitaRepository = $kitaRepository;
    }

    /**
     * Pre-Processing of all actions
     */
    public function initializeAction(): void
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    /**
     * convert a time string to int
     * 7.25 => 25300. Seconds since 0:00
     *
     * @param float $time
     * @return int Seconds
     */
    public function convertTimeToInt(float $time): int
    {
        $parts = GeneralUtility::trimExplode('.', number_format($time, 2, '.', ''));
        $seconds = (int)$parts[0] * 3600;
        if (isset($parts[1])) {
            // convert 25 (quarter of hundred) to 15 (quarter an hour)
            $seconds += ((int)$parts[1] * 60 / 100) * 60;
        }

        return $seconds;
    }
}
