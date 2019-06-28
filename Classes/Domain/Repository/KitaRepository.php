<?php
declare(strict_types = 1);
namespace JWeiland\Daycarecenters\Domain\Repository;

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

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to get and search for kitas from DB
 */
class KitaRepository extends Repository
{
    /**
     * search Kitas
     *
     * @param integer $earliestAge
     * @param integer $latestAge
     * @param string $earliestOpeningTimes
     * @param string $latestOpeningTimes
     * @param boolean $food
     * @param integer $district
     * @return QueryResultInterface
     */
    public function searchKitas(
        $earliestAge,
        $latestAge,
        $earliestOpeningTimes,
        $latestOpeningTimes,
        $food,
        $district = 0
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
