<?php
declare(strict_types=1);
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

use JWeiland\Maps2\Domain\Model\PoiCollection;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Kita
 */
class Kita extends AbstractEntity
{
    /**
     * Title
     *
     * @var string
     */
    protected $title = '#';

    /**
     * Leader
     *
     * @var string
     */
    protected $leader = '';

    /**
     * Places
     *
     * @var string
     */
    protected $places = '';

    /**
     * Street
     *
     * @var string
     */
    protected $street = '';

    /**
     * House number
     *
     * @var string
     */
    protected $houseNumber = '';

    /**
     * Zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * City
     *
     * @var string
     */
    protected $city = '';

    /**
     * Email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Website
     *
     * @var string
     */
    protected $website = '';

    /**
     * Amount of groups
     *
     * @var string
     */
    protected $amountOfGroups = '';

    /**
     * Space offered
     *
     * @var string
     */
    protected $spaceOffered = '';

    /**
     * Foot Supply
     *
     * @var bool
     */
    protected $foodSupply = false;

    /**
     * Foot Info
     *
     * @var string
     */
    protected $foodInfo = '';

    /**
     * Foot Prices
     *
     * @var string
     */
    protected $foodPrices = '';

    /**
     * Closing Days
     *
     * @var string
     */
    protected $closingDays = '';

    /**
     * Logo
     *
     * @var \JWeiland\Daycarecenters\Domain\Model\FileReference
     */
    protected $logo;

    /**
     * Images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Daycarecenters\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * Response Times
     *
     * @var string
     */
    protected $responseTimes = '';

    /**
     * Facebook
     *
     * @var string
     */
    protected $facebook = '';

    /**
     * Twitter
     *
     * @var string
     */
    protected $twitter = '';

    /**
     * Google
     *
     * @var string
     */
    protected $google = '';

    /**
     * Additional informations
     *
     * @var string
     */
    protected $additionalInformations = '';

    /**
     * earliest_opening_time
     *
     * @var int
     */
    protected $earliestOpeningTime = 0;

    /**
     * latest_opening_time
     *
     * @var int
     */
    protected $latestOpeningTime = 0;

    /**
     * earliest_age
     *
     * @var int
     */
    protected $earliestAge = 0;

    /**
     * latestAge
     *
     * @var int
     */
    protected $latestAge = 0;

    /**
     * Holder
     *
     * @var \JWeiland\Daycarecenters\Domain\Model\Holder
     * @lazy
     */
    protected $holder;

    /**
     * Care Form
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Daycarecenters\Domain\Model\CareForm>
     * @lazy
     */
    protected $careForm;

    /**
     * District
     *
     * @var \JWeiland\Daycarecenters\Domain\Model\District
     * @lazy
     */
    protected $district;

    /**
     * Telephones
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Daycarecenters\Domain\Model\Telephone>
     * @lazy
     */
    protected $telephones;

    /**
     * TxMaps2Uid
     *
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * constructor of this class
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->telephones = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the leader
     *
     * @return string $leader
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Sets the leader
     *
     * @param string $leader
     * @return void
     */
    public function setLeader(string $leader)
    {
        $this->leader = $leader;
    }

    /**
     * Returns Places
     *
     * @return string
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Sets Places
     *
     * @param string $places
     * @return void
     */
    public function setPlaces(string $places)
    {
        $this->places = $places;
    }

    /**
     * Returns the street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street
     *
     * @param string $street
     * @return void
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * Returns the houseNumber
     *
     * @return string $houseNumber
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Sets the houseNumber
     *
     * @param string $houseNumber
     * @return void
     */
    public function setHouseNumber(string $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the website
     *
     * @return string $website
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Sets the website
     *
     * @param string $website
     * @return void
     */
    public function setWebsite(string $website)
    {
        $this->website = $website;
    }

    /**
     * Returns the amountOfGroups
     *
     * @return string $amountOfGroups
     */
    public function getAmountOfGroups()
    {
        return $this->amountOfGroups;
    }

    /**
     * Sets the amountOfGroups
     *
     * @param string $amountOfGroups
     * @return void
     */
    public function setAmountOfGroups(string $amountOfGroups)
    {
        $this->amountOfGroups = $amountOfGroups;
    }

    /**
     * Returns the spaceOffered
     *
     * @return string $spaceOffered
     */
    public function getSpaceOffered()
    {
        return $this->spaceOffered;
    }

    /**
     * Sets the spaceOffered
     *
     * @param string $spaceOffered
     * @return void
     */
    public function setSpaceOffered(string $spaceOffered)
    {
        $this->spaceOffered = $spaceOffered;
    }

    /**
     * Returns the foodSupply
     *
     * @return bool $foodSupply
     */
    public function getFoodSupply()
    {
        return $this->foodSupply;
    }

    /**
     * Sets the foodSupply
     *
     * @param bool $foodSupply
     * @return void
     */
    public function setFoodSupply(bool $foodSupply)
    {
        $this->foodSupply = $foodSupply;
    }

    /**
     * Returns the foodInfo
     *
     * @return string $foodInfo
     */
    public function getFoodInfo()
    {
        return $this->foodInfo;
    }

    /**
     * Sets the foodInfo
     *
     * @param string $foodInfo
     * @return void
     */
    public function setFoodInfo(string $foodInfo)
    {
        $this->foodInfo = $foodInfo;
    }

    /**
     * Returns the foodPrices
     *
     * @return string $foodPrices
     */
    public function getFoodPrices()
    {
        return $this->foodPrices;
    }

    /**
     * Sets the foodPrices
     *
     * @param string $foodPrices
     * @return void
     */
    public function setFoodPrices(string $foodPrices)
    {
        $this->foodPrices = $foodPrices;
    }

    /**
     * Returns the closingDays
     *
     * @return string $closingDays
     */
    public function getClosingDays()
    {
        return $this->closingDays;
    }

    /**
     * Sets the closingDays
     *
     * @param string $closingDays
     * @return void
     */
    public function setClosingDays(string $closingDays)
    {
        $this->closingDays = $closingDays;
    }

    /**
     * Returns the logo
     *
     * @return \JWeiland\Daycarecenters\Domain\Model\FileReference $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets the logo
     *
     * @param \JWeiland\Daycarecenters\Domain\Model\FileReference $logo
     * @return void
     */
    public function setLogo(\JWeiland\Daycarecenters\Domain\Model\FileReference $logo)
    {
        $this->logo = $logo;
    }

    /**
     * Returns the images
     *
     * @return ObjectStorage $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param ObjectStorage $images
     * @return void
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the responseTimes
     *
     * @return string $responseTimes
     */
    public function getResponseTimes()
    {
        return $this->responseTimes;
    }

    /**
     * Sets the responseTimes
     *
     * @param string $responseTimes
     * @return void
     */
    public function setResponseTimes(string $responseTimes)
    {
        $this->responseTimes = $responseTimes;
    }

    /**
     * Returns the facebook
     *
     * @return string $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Sets the facebook
     *
     * @param string $facebook
     * @return void
     */
    public function setFacebook(string $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Returns the twitter
     *
     * @return string $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Sets the twitter
     *
     * @param string $twitter
     * @return void
     */
    public function setTwitter(string $twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * Returns the google
     *
     * @return string $google
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * Sets the google
     *
     * @param string $google
     * @return void
     */
    public function setGoogle(string $google)
    {
        $this->google = $google;
    }

    /**
     * Returns the additionalInformations
     *
     * @return string $additionalInformations
     */
    public function getAdditionalInformations()
    {
        return $this->additionalInformations;
    }

    /**
     * Sets the additionalInformations
     *
     * @param string $additionalInformations
     * @return void
     */
    public function setAdditionalInformations(string $additionalInformations)
    {
        $this->additionalInformations = $additionalInformations;
    }

    /**
     * Returns the earliestOpeningTime
     *
     * @return int $earliestOpeningTime
     */
    public function getEarliestOpeningTime()
    {
        return $this->earliestOpeningTime;
    }

    /**
     * Sets the earliestOpeningTime
     *
     * @param int $earliestOpeningTime
     * @return void
     */
    public function setEarliestOpeningTime(int $earliestOpeningTime)
    {
        $this->earliestOpeningTime = $earliestOpeningTime;
    }

    /**
     * Returns the latestOpeningTime
     *
     * @return int $earliestOpeningTime
     */
    public function getLatestOpeningTime()
    {
        return $this->latestOpeningTime;
    }

    /**
     * Sets the latestOpeningTime
     *
     * @param int $latestOpeningTime
     * @return void
     */
    public function setLatestOpeningTime(int $latestOpeningTime)
    {
        $this->latestOpeningTime = $latestOpeningTime;
    }

    /**
     * Returns the earliestAge
     *
     * @return int $earliestAge
     */
    public function getEarliestAge()
    {
        return $this->earliestAge;
    }

    /**
     * Sets the earliestAge
     *
     * @param int $earliestAge
     * @return void
     */
    public function setEarliestAge(int $earliestAge)
    {
        $this->earliestAge = $earliestAge;
    }

    /**
     * Returns the latestAge
     *
     * @return int $latestAge
     */
    public function getLatestAge()
    {
        return $this->latestAge;
    }

    /**
     * Sets the latestAge
     *
     * @param int $latestAge
     * @return void
     */
    public function setLatestAge(int $latestAge)
    {
        $this->latestAge = $latestAge;
    }

    /**
     * Returns the holder
     *
     * @return Holder $holder
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Sets the holder
     *
     * @param Holder $holder
     * @return void
     */
    public function setHolder(Holder $holder)
    {
        $this->holder = $holder;
    }

    /**
     * Returns the careForm
     *
     * @return ObjectStorage $careForm
     */
    public function getCareForm()
    {
        return $this->careForm;
    }

    /**
     * Sets the careForm
     *
     * @param ObjectStorage $careForm
     * @return void
     */
    public function setCareForm(ObjectStorage $careForm)
    {
        $this->careForm = $careForm;
    }

    /**
     * Returns the district
     *
     * @return District $district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the district
     *
     * @param District $district
     * @return void
     */
    public function setDistrict(District $district)
    {
        $this->district = $district;
    }

    /**
     * Adds a Telephone
     *
     * @param Telephone $telephone
     * @return void
     */
    public function addTelephone(Telephone $telephone)
    {
        $this->telephones->attach($telephone);
    }

    /**
     * Removes a Telephone
     *
     * @param Telephone $telephoneToRemove The Telephone to be removed
     * @return void
     */
    public function removeTelephone(Telephone $telephoneToRemove)
    {
        $this->telephones->detach($telephoneToRemove);
    }

    /**
     * Returns the telephones
     *
     * @return ObjectStorage $telephones
     */
    public function getTelephones()
    {
        return $this->telephones;
    }

    /**
     * Sets the telephones
     *
     * @param ObjectStorage $telephones
     * @return void
     */
    public function setTelephones(ObjectStorage $telephones)
    {
        $this->telephones = $telephones;
    }

    /**
     * Returns the txMaps2Uid
     *
     * @return PoiCollection $txMaps2Uid
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * Sets the txMaps2Uid
     *
     * @param PoiCollection $txMaps2Uid
     * @return void
     */
    public function setTxMaps2Uid(PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }
}
