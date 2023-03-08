<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Controller;

use JWeiland\Daycarecenters\Domain\Model\Kita;
use JWeiland\Daycarecenters\Domain\Repository\DistrictRepository;
use JWeiland\Daycarecenters\Domain\Repository\KitaRepository;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller with methods to show and list kitas
 */
class KitaController extends ActionController
{
    /**
     * @var DistrictRepository
     */
    protected $districtRepository;

    /**
     * @var PageRenderer
     */
    protected $pageRenderer;

    /**
     * @var KitaRepository
     */
    protected $kitaRepository;

    public function injectDistrictRepository(DistrictRepository $districtRepository): void
    {
        $this->districtRepository = $districtRepository;
    }

    public function injectPageRenderer(PageRenderer $pageRenderer): void
    {
        $this->pageRenderer = $pageRenderer;
    }

    public function injectKitaRepository(KitaRepository $kitaRepository): void
    {
        $this->kitaRepository = $kitaRepository;
    }

    public function initializeAction(): void
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    public function listAction(): void
    {
        $this->view->assign('earliestAge', (int)$this->settings['search']['earliestAge']);
        $this->view->assign('latestAge', (int)$this->settings['search']['latestAge']);
        $this->view->assign('earliestOpeningTime', $this->settings['search']['earliestOpeningTime']);
        $this->view->assign('latestOpeningTime', $this->settings['search']['latestOpeningTime']);
        $this->view->assign('districts', $this->districtRepository->findAll());
        $this->view->assign('kitas', $this->kitaRepository->findAll());
    }

    public function showAction(Kita $kita): void
    {
        $this->view->assign('kita', $kita);
    }

    public function searchAction(
        int $earliestAge = 0,
        int $latestAge = 6,
        float $earliestOpeningTime = 7.00,
        float $latestOpeningTime = 18.00,
        bool $food = false,
        int $district = 0
    ): void {
        $kitas = $this->kitaRepository->searchKitas(
            $earliestAge,
            $latestAge,
            $this->convertTimeToInt($earliestOpeningTime),
            $this->convertTimeToInt($latestOpeningTime),
            $food,
            $district
        );
        $this->view->assign('earliestAge', $earliestAge);
        $this->view->assign('latestAge', $latestAge);
        $this->view->assign('earliestOpeningTime', $earliestOpeningTime);
        $this->view->assign('latestOpeningTime', $latestOpeningTime);
        $this->view->assign('food', $food);
        $this->view->assign('district', $district);
        $this->view->assign('districts', $this->districtRepository->findAll());
        $this->view->assign('kitas', $kitas);
    }

    /**
     * convert a time string to int (seconds)
     * 7.25 => 25300. Seconds since 0:00
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
