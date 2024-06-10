<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain model which represents a Holder
 */
class Holder extends AbstractEntity
{
    protected string $title = '';

    protected string $contactPerson = '';

    protected string $street = '';

    protected string $houseNumber = '';

    protected string $zip = '';

    protected string $city = '';

    protected string $telephone = '';

    protected string $fax = '';

    protected string $email = '';

    protected string $website = '';

    /**
     * @var ObjectStorage<FileReference>
     */
    #[Extbase\ORM\Lazy]
    protected ObjectStorage $logos;

    public function __construct()
    {
        $this->logos = new ObjectStorage();
    }

    public function initializeObject(): void
    {
        $this->logos = $this->logos ?? new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): void
    {
        $this->contactPerson = $contactPerson;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    public function getLogos(): ObjectStorage
    {
        return $this->logos;
    }

    public function setLogos(ObjectStorage $logo): void
    {
        $this->logos = $logo;
    }

    public function addLogo(FileReference $file): void
    {
        $this->logos->attach($file);
    }

    public function removeLogo(FileReference $file): void
    {
        $this->logos->detach($file);
    }
}
