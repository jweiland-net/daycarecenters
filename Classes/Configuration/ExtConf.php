<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Configuration;

use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class, which contains the configuration from ExtensionManager
 */
class ExtConf implements SingletonInterface
{
    /**
     * @var int
     */
    protected $poiCollectionPid = 0;

    /**
     * @var int
     */
    protected $defaultMaps2Category = 0;

    public function __construct(ExtensionConfiguration $extensionConfiguration)
    {
        try {
            $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('daycarecenters');
            if (is_array($extConf)) {
                // call setter method foreach configuration entry
                foreach ($extConf as $key => $value) {
                    $methodName = 'set' . ucfirst($key);
                    if (method_exists($this, $methodName)) {
                        $this->$methodName($value);
                    }
                }
            }
        } catch (ExtensionConfigurationExtensionNotConfiguredException | ExtensionConfigurationPathDoesNotExistException $e) {
        }
    }

    public function getPoiCollectionPid(): int
    {
        return $this->poiCollectionPid;
    }

    public function setPoiCollectionPid(string $poiCollectionPid): void
    {
        $this->poiCollectionPid = (int)$poiCollectionPid;
    }

    public function getDefaultMaps2Category(): int
    {
        return $this->defaultMaps2Category;
    }

    public function setDefaultMaps2Category(string $defaultMaps2Category): void
    {
        $this->defaultMaps2Category = (int)$defaultMaps2Category;
    }
}
