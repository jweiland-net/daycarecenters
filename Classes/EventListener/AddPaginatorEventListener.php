<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\EventListener;

use JWeiland\Daycarecenters\Event\PostProcessFluidVariablesEvent;
use JWeiland\Daycarecenters\Pagination\DaycarecenterPagination;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;

/**
 * Register paginator to paginate through the company records in frontend
 */
class AddPaginatorEventListener extends AbstractControllerEventListener
{
    protected int $itemsPerPage = 15;

    protected $allowedControllerActions = [
        'Kita' => [
            'list',
            'search',
        ],
    ];

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        if ($this->isValidRequest($event)) {
            $paginator = new QueryResultPaginator(
                $event->getFluidVariables()['kitas'],
                $this->getCurrentPage($event),
                $this->getItemsPerPage($event),
            );

            $event->addFluidVariable('actionName', $event->getActionName());
            $event->addFluidVariable('paginator', $paginator);
            $event->addFluidVariable('kitas', $paginator->getPaginatedItems());
            $event->addFluidVariable('pagination', new DaycarecenterPagination($paginator));
        }
    }

    protected function getCurrentPage(PostProcessFluidVariablesEvent $event): int
    {
        $currentPage = 1;
        if ($event->getRequest()->hasArgument('currentPage')) {
            $currentPage = $event->getRequest()->getArgument('currentPage');
        }

        return (int)$currentPage;
    }

    protected function getItemsPerPage(PostProcessFluidVariablesEvent $event): int
    {
        return (int)($event->getSettings()['pageBrowser']['itemsPerPage'] ?? $this->itemsPerPage);
    }
}
