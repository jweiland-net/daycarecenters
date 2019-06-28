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

use JWeiland\Daycarecenters\Domain\Model\Kita;
use JWeiland\Daycarecenters\Domain\Repository\DistrictRepository;
use TYPO3\CMS\Core\Page\PageRenderer;

/**
 * Controller with methods to show and list kitas
 */
class KitaController extends AbstractController
{
    /**
     * districtRepository
     *
     * @var DistrictRepository
     */
    protected $districtRepository;

    /**
     * @var PageRenderer
     */
    protected $pageRenderer;

    /**
     * inject districtRepository
     *
     * @param DistrictRepository $districtRepository
     * @return void
     */
    public function injectDistrictRepository(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    /**
     * inject pageRenderer
     *
     * @param PageRenderer $pageRenderer
     * @return void
     */
    public function injectPageRenderer(PageRenderer $pageRenderer)
    {
        $this->pageRenderer = $pageRenderer;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $this->view->assign('earliestAge', (int)$this->settings['search']['earliestAge']);
        $this->view->assign('latestAge', (int)$this->settings['search']['latestAge']);
        $this->view->assign('earliestOpeningTime', $this->settings['search']['earliestOpeningTime']);
        $this->view->assign('latestOpeningTime', $this->settings['search']['latestOpeningTime']);
        $this->view->assign('districts', $this->districtRepository->findAll());
        $this->view->assign('kitas', $this->kitaRepository->findAll());
    }

    /**
     * action show
     *
     * @param Kita $kita
     * @return void
     */
    public function showAction(Kita $kita)
    {
        $this->view->assign('kita', $kita);
    }

    /**
     * search show
     *
     * @param integer $earliestAge
     * @param integer $latestAge
     * @param float $earliestOpeningTime
     * @param float $latestOpeningTime
     * @param boolean $food
     * @param integer $district
     * @return void
     */
    public function searchAction(
        $earliestAge = 0,
        $latestAge = 6,
        $earliestOpeningTime = 7.00,
        $latestOpeningTime = 18.00,
        $food = false,
        $district = 0
    ) {
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
}
