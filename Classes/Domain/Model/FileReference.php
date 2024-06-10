<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Domain\Model;

/**
 * Domain model which represents a FileReference
 */
class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{
    protected string $title = '';

    /**
     * @var int
     */
    protected $cruserId = 0;

    /**
     * @var int
     */
    protected $uidLocal = 0;

    protected string $tablenames = '';

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCruserId(): int
    {
        return $this->cruserId;
    }

    public function setCruserId(int $cruserId): void
    {
        $this->cruserId = $cruserId;
    }

    public function getUidLocal(): int
    {
        return $this->uidLocal;
    }

    public function setUidLocal(int $uidLocal): void
    {
        $this->uidLocal = $uidLocal;
    }

    public function getTablenames(): string
    {
        return $this->tablenames;
    }

    public function setTablenames(string $tablenames): void
    {
        $this->tablenames = $tablenames;
    }
}
