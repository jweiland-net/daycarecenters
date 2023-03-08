<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain model which represents a Kita
 */
class Kita extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '#';

    /**
     * @var string
     */
    protected $leader = '';

    /**
     * @var string
     */
    protected $places = '';

    /**
     * @var string
     */
    protected $street = '';

    /**
     * @var string
     */
    protected $houseNumber = '';

    /**
     * @var string
     */
    protected $zip = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $website = '';

    /**
     * @var string
     */
    protected $amountOfGroups = '';

    /**
     * @var string
     */
    protected $spaceOffered = '';

    /**
     * @var bool
     */
    protected $foodSupply = false;

    /**
     * @var string
     */
    protected $foodInfo = '';

    /**
     * @var string
     */
    protected $foodPrices = '';

    /**
     * @var string
     */
    protected $closingDays = '';

    /**
     * @var FileReference
     */
    protected $logo;

    /**
     * @var ObjectStorage<FileReference>
     *
     * @Extbase\ORM\Lazy
     */
    protected $images;

    /**
     * @var string
     */
    protected $responseTimes = '';

    /**
     * @var string
     */
    protected $facebook = '';

    /**
     * @var string
     */
    protected $twitter = '';

    /**
     * @var string
     */
    protected $instagram = '';

    /**
     * @var string
     */
    protected $additionalInformations = '';

    /**
     * @var int
     */
    protected $earliestOpeningTime = 0;

    /**
     * @var int
     */
    protected $latestOpeningTime = 0;

    /**
     * @var int
     */
    protected $earliestAge = 0;

    /**
     * @var int
     */
    protected $latestAge = 0;

    /**
     * @var Holder
     */
    protected $holder;

    /**
     * @var ObjectStorage<CareForm>
     *
     * @Extbase\ORM\Lazy
     */
    protected $careForm;

    /**
     * @var District
     */
    protected $district;

    /**
     * @var ObjectStorage<Telephone>
     *
     * @Extbase\ORM\Lazy
     */
    protected $telephones;

    /**
     * @var PoiCollection
     */
    protected $txMaps2Uid;

    public function __construct()
    {
        $this->images = new ObjectStorage();
        $this->careForm = new ObjectStorage();
        $this->telephones = new ObjectStorage();
    }

    protected function initializeObject(): void
    {
        $this->images = $this->images ?? new ObjectStorage();
        $this->careForm = $this->careForm ?? new ObjectStorage();
        $this->telephones = $this->telephones ?? new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLeader(): string
    {
        return $this->leader;
    }

    public function setLeader(string $leader): void
    {
        $this->leader = $leader;
    }

    public function getPlaces(): string
    {
        return $this->places;
    }

    public function setPlaces(string $places): void
    {
        $this->places = $places;
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

    public function getAmountOfGroups(): string
    {
        return $this->amountOfGroups;
    }

    public function setAmountOfGroups(string $amountOfGroups): void
    {
        $this->amountOfGroups = $amountOfGroups;
    }

    public function getSpaceOffered(): string
    {
        return $this->spaceOffered;
    }

    public function setSpaceOffered(string $spaceOffered): void
    {
        $this->spaceOffered = $spaceOffered;
    }

    public function getFoodSupply(): bool
    {
        return $this->foodSupply;
    }

    public function setFoodSupply(bool $foodSupply): void
    {
        $this->foodSupply = $foodSupply;
    }

    public function getFoodInfo(): string
    {
        return $this->foodInfo;
    }

    public function setFoodInfo(string $foodInfo): void
    {
        $this->foodInfo = $foodInfo;
    }

    public function getFoodPrices(): string
    {
        return $this->foodPrices;
    }

    public function setFoodPrices(string $foodPrices): void
    {
        $this->foodPrices = $foodPrices;
    }

    public function getClosingDays(): string
    {
        return $this->closingDays;
    }

    public function setClosingDays(string $closingDays): void
    {
        $this->closingDays = $closingDays;
    }

    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    public function setLogo(FileReference $logo = null): void
    {
        $this->logo = $logo;
    }

    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    public function getResponseTimes(): string
    {
        return $this->responseTimes;
    }

    public function setResponseTimes(string $responseTimes): void
    {
        $this->responseTimes = $responseTimes;
    }

    public function getFacebook(): string
    {
        return $this->facebook;
    }

    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getTwitter(): string
    {
        return $this->twitter;
    }

    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    public function getInstagram(): string
    {
        return $this->instagram;
    }

    public function setInstagram(string $instagram): void
    {
        $this->instagram = $instagram;
    }

    public function getAdditionalInformations(): string
    {
        return $this->additionalInformations;
    }

    public function setAdditionalInformations(string $additionalInformations): void
    {
        $this->additionalInformations = $additionalInformations;
    }

    public function getEarliestOpeningTime(): int
    {
        return $this->earliestOpeningTime;
    }

    public function setEarliestOpeningTime(int $earliestOpeningTime): void
    {
        $this->earliestOpeningTime = $earliestOpeningTime;
    }

    public function getLatestOpeningTime(): int
    {
        return $this->latestOpeningTime;
    }

    public function setLatestOpeningTime(int $latestOpeningTime): void
    {
        $this->latestOpeningTime = $latestOpeningTime;
    }

    public function getEarliestAge(): int
    {
        return $this->earliestAge;
    }

    public function setEarliestAge(int $earliestAge): void
    {
        $this->earliestAge = $earliestAge;
    }

    public function getLatestAge(): int
    {
        return $this->latestAge;
    }

    public function setLatestAge(int $latestAge): void
    {
        $this->latestAge = $latestAge;
    }

    public function getHolder(): ?Holder
    {
        return $this->holder;
    }

    public function setHolder(Holder $holder = null): void
    {
        $this->holder = $holder;
    }

    public function getCareForm(): ObjectStorage
    {
        return $this->careForm;
    }

    public function setCareForm(ObjectStorage $careForm): void
    {
        $this->careForm = $careForm;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(District $district = null): void
    {
        $this->district = $district;
    }

    public function addTelephone(Telephone $telephone): void
    {
        $this->telephones->attach($telephone);
    }

    public function removeTelephone(Telephone $telephone): void
    {
        $this->telephones->detach($telephone);
    }

    public function getTelephones(): ObjectStorage
    {
        return $this->telephones;
    }

    public function setTelephones(ObjectStorage $telephones): void
    {
        $this->telephones = $telephones;
    }

    public function getTxMaps2Uid(): ?PoiCollection
    {
        return $this->txMaps2Uid;
    }

    public function setTxMaps2Uid(PoiCollection $txMaps2Uid): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }
}
