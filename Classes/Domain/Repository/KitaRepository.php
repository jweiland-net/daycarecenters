<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to get and search for kitas from DB
 */
class KitaRepository extends Repository
{
    public function searchKitas(
        int $earliestAge,
        int $latestAge,
        int $earliestOpeningTimes,
        int $latestOpeningTimes,
        bool $food,
        int $district = 0
    ): QueryResultInterface {
        $query = $this->createQuery();
        $constraint = [];

        // add age to constraint
        $constraint[] = $query->lessThanOrEqual('earliestAge', $earliestAge);
        $constraint[] = $query->greaterThanOrEqual('latestAge', $latestAge);

        // add openingTimes
        $constraint[] = $query->lessThanOrEqual('earliestOpeningTime', $earliestOpeningTimes);
        $constraint[] = $query->greaterThanOrEqual('latestOpeningTime', $latestOpeningTimes);

        // add food supply
        if ($food) {
            $constraint[] = $query->equals('foodSupply', $food);
        }

        // add district
        if (!empty($district)) {
            $constraint[] = $query->equals('district', $district);
        }

        return $query->matching(
            $query->logicalAnd($constraint)
        )->execute();
    }
}
