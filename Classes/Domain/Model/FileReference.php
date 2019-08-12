<?php
declare(strict_types = 1);
namespace JWeiland\Daycarecenters\Domain\Model;

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

/**
 * Domain model which represents a FileReference
 */
class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var int
     */
    protected $cruserId = 0;

    /**
     * @var int
     */
    protected $uidLocal = 0;

    /**
     * @var string
     */
    protected $tablenames = '';

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getCruserId(): int
    {
        return $this->cruserId;
    }

    /**
     * @param int $cruserId
     */
    public function setCruserId(int $cruserId)
    {
        $this->cruserId = $cruserId;
    }

    /**
     * @return int
     */
    public function getUidLocal(): int
    {
        return $this->uidLocal;
    }

    /**
     * @param int $uidLocal
     */
    public function setUidLocal(int $uidLocal)
    {
        $this->uidLocal = $uidLocal;
    }

    /**
     * @return string
     */
    public function getTablenames(): string
    {
        return $this->tablenames;
    }

    /**
     * @param string $tablenames
     */
    public function setTablenames(string $tablenames)
    {
        $this->tablenames = $tablenames;
    }
}
