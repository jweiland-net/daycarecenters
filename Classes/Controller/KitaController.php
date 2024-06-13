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
use JWeiland\Daycarecenters\Event\PostProcessFluidVariablesEvent;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller with methods to show and list kitas
 */
class KitaController extends ActionController
{
    protected DistrictRepository $districtRepository;

    protected PageRenderer $pageRenderer;

    protected KitaRepository $kitaRepository;

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

    public function listAction(): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'earliestAge' => (int)$this->settings['search']['earliestAge'],
            'latestAge' => (int)$this->settings['search']['latestAge'],
            'earliestOpeningTime' => $this->settings['search']['earliestOpeningTime'],
            'latestOpeningTime' => $this->settings['search']['latestOpeningTime'],
            'districts' => $this->districtRepository->findAll(),
            'kitas' => $this->kitaRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }

    public function showAction(Kita $kita): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'kita' => $kita,
        ]);

        return $this->htmlResponse();
    }

    public function searchAction(
        int $earliestAge = 0,
        int $latestAge = 6,
        float $earliestOpeningTime = 7.00,
        float $latestOpeningTime = 18.00,
        bool $food = false,
        int $district = 0
    ): ResponseInterface {
        $kitas = $this->kitaRepository->searchKitas(
            $earliestAge,
            $latestAge,
            $this->convertTimeToInt($earliestOpeningTime),
            $this->convertTimeToInt($latestOpeningTime),
            $food,
            $district
        );

        $this->postProcessAndAssignFluidVariables([
            'earliestAge' => $earliestAge,
            'latestAge' => $latestAge,
            'earliestOpeningTime' => $earliestOpeningTime,
            'latestOpeningTime' => $latestOpeningTime,
            'food' => $food,
            'district' => $district,
            'districts' => $this->districtRepository->findAll(),
            'kitas' => $kitas,
        ]);

        return $this->htmlResponse();
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

    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
