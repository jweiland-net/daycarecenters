<?php
declare(strict_types=1);
namespace JWeiland\Daycarecenters\Controller;

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

use JWeiland\Daycarecenters\Domain\Repository\KitaRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class AbstractController
 *
 * @package JWeiland\Daycarecenters\Controller
 */
class AbstractController extends ActionController
{
    /**
     * kitaRepository
     *
     * @var KitaRepository
     */
    protected $kitaRepository;

    /**
     * inject kitaRepository
     *
     * @param KitaRepository $kitaRepository
     * @return void
     */
    public function injectKitaRepository(KitaRepository $kitaRepository)
    {
        $this->kitaRepository = $kitaRepository;
    }

    /**
     * preprocessing of all actions
     *
     * @return void
     */
    public function initializeAction()
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
     * @param string $time
     * @return int Seconds
     */
    public function convertTimeToInt($time)
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
