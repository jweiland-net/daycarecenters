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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
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
     * @var \JWeiland\Daycarecenters\Domain\Model\FileReference
     */
    protected $logo;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Daycarecenters\Domain\Model\FileReference>
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
     * @var \JWeiland\Daycarecenters\Domain\Model\Holder
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $holder;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Daycarecenters\Domain\Model\CareForm>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $careForm;

    /**
     * @var \JWeiland\Daycarecenters\Domain\Model\District
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $district;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Daycarecenters\Domain\Model\Telephone>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $telephones;

    /**
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     */
    protected function initStorageObjects(): void
    {
        $this->telephones = new ObjectStorage();
    }

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
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLeader(): string
    {
        return $this->leader;
    }

    /**
     * @param string $leader
     */
    public function setLeader(string $leader): void
    {
        $this->leader = $leader;
    }

    /**
     * @return string
     */
    public function getPlaces(): string
    {
        return $this->places;
    }

    /**
     * @param string $places
     */
    public function setPlaces(string $places): void
    {
        $this->places = $places;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getAmountOfGroups(): string
    {
        return $this->amountOfGroups;
    }

    /**
     * @param string $amountOfGroups
     */
    public function setAmountOfGroups(string $amountOfGroups): void
    {
        $this->amountOfGroups = $amountOfGroups;
    }

    /**
     * @return string
     */
    public function getSpaceOffered(): string
    {
        return $this->spaceOffered;
    }

    /**
     * @param string $spaceOffered
     */
    public function setSpaceOffered(string $spaceOffered): void
    {
        $this->spaceOffered = $spaceOffered;
    }

    /**
     * @return bool
     */
    public function getFoodSupply(): bool
    {
        return $this->foodSupply;
    }

    /**
     * @param bool $foodSupply
     */
    public function setFoodSupply(bool $foodSupply): void
    {
        $this->foodSupply = $foodSupply;
    }

    /**
     * @return string
     */
    public function getFoodInfo(): string
    {
        return $this->foodInfo;
    }

    /**
     * @param string $foodInfo
     */
    public function setFoodInfo(string $foodInfo): void
    {
        $this->foodInfo = $foodInfo;
    }

    /**
     * @return string
     */
    public function getFoodPrices(): string
    {
        return $this->foodPrices;
    }

    /**
     * @param string $foodPrices
     */
    public function setFoodPrices(string $foodPrices): void
    {
        $this->foodPrices = $foodPrices;
    }

    /**
     * @return string
     */
    public function getClosingDays(): string
    {
        return $this->closingDays;
    }

    /**
     * @param string $closingDays
     */
    public function setClosingDays(string $closingDays): void
    {
        $this->closingDays = $closingDays;
    }

    /**
     * @return FileReference|null
     */
    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    /**
     * @param FileReference|null $logo
     */
    public function setLogo(FileReference $logo = null): void
    {
        $this->logo = $logo;
    }

    /**
     * @return ObjectStorage
     */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getResponseTimes(): string
    {
        return $this->responseTimes;
    }

    /**
     * @param string $responseTimes
     */
    public function setResponseTimes(string $responseTimes): void
    {
        $this->responseTimes = $responseTimes;
    }

    /**
     * @return string
     */
    public function getFacebook(): string
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getInstagram(): string
    {
        return $this->instagram;
    }

    /**
     * @param string $instagram
     */
    public function setInstagram(string $instagram): void
    {
        $this->instagram = $instagram;
    }

    /**
     * @return string
     */
    public function getAdditionalInformations(): string
    {
        return $this->additionalInformations;
    }

    /**
     * @param string $additionalInformations
     */
    public function setAdditionalInformations(string $additionalInformations): void
    {
        $this->additionalInformations = $additionalInformations;
    }

    /**
     * @return int
     */
    public function getEarliestOpeningTime(): int
    {
        return $this->earliestOpeningTime;
    }

    /**
     * @param int $earliestOpeningTime
     */
    public function setEarliestOpeningTime(int $earliestOpeningTime): void
    {
        $this->earliestOpeningTime = $earliestOpeningTime;
    }

    /**
     * @return int
     */
    public function getLatestOpeningTime(): int
    {
        return $this->latestOpeningTime;
    }

    /**
     * @param int $latestOpeningTime
     */
    public function setLatestOpeningTime(int $latestOpeningTime): void
    {
        $this->latestOpeningTime = $latestOpeningTime;
    }

    /**
     * @return int
     */
    public function getEarliestAge(): int
    {
        return $this->earliestAge;
    }

    /**
     * @param int $earliestAge
     */
    public function setEarliestAge(int $earliestAge): void
    {
        $this->earliestAge = $earliestAge;
    }

    /**
     * @return int
     */
    public function getLatestAge(): int
    {
        return $this->latestAge;
    }

    /**
     * @param int $latestAge
     */
    public function setLatestAge(int $latestAge): void
    {
        $this->latestAge = $latestAge;
    }

    /**
     * @return Holder|LazyLoadingProxy|null
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param Holder|null $holder
     */
    public function setHolder(Holder $holder = null): void
    {
        $this->holder = $holder;
    }

    /**
     * @return ObjectStorage
     */
    public function getCareForm(): ObjectStorage
    {
        return $this->careForm;
    }

    /**
     * @param ObjectStorage $careForm
     */
    public function setCareForm(ObjectStorage $careForm): void
    {
        $this->careForm = $careForm;
    }

    /**
     * @return District|LazyLoadingProxy|null
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param District $district
     */
    public function setDistrict(District $district = null): void
    {
        $this->district = $district;
    }

    /**
     * @param Telephone $telephone
     */
    public function addTelephone(Telephone $telephone): void
    {
        $this->telephones->attach($telephone);
    }

    /**
     * @param Telephone $telephone
     */
    public function removeTelephone(Telephone $telephone): void
    {
        $this->telephones->detach($telephone);
    }

    /**
     * @return ObjectStorage
     */
    public function getTelephones(): ObjectStorage
    {
        return $this->telephones;
    }

    /**
     * @param ObjectStorage $telephones
     */
    public function setTelephones(ObjectStorage $telephones): void
    {
        $this->telephones = $telephones;
    }

    /**
     * @return PoiCollection|null
     */
    public function getTxMaps2Uid(): ?PoiCollection
    {
        return $this->txMaps2Uid;
    }

    /**
     * @param PoiCollection $txMaps2Uid
     */
    public function setTxMaps2Uid(PoiCollection $txMaps2Uid): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }
}
