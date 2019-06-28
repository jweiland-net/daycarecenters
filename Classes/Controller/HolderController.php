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

use JWeiland\Daycarecenters\Domain\Model\Holder;

/**
 * Class HolderController
 */
class HolderController extends AbstractController
{
    /**
     * action show
     *
     * @param Holder $holder
     * @return void
     */
    public function showAction(Holder $holder)
    {
        $this->view->assign('holder', $holder);
    }
}
