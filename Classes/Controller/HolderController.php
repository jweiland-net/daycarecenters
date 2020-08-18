<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Controller;

use JWeiland\Daycarecenters\Domain\Model\Holder;

/**
 * Controller to show holder of a kita
 */
class HolderController extends AbstractController
{
    /**
     * @param Holder $holder
     */
    public function showAction(Holder $holder): void
    {
        $this->view->assign('holder', $holder);
    }
}
