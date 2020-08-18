<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Configuration;

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

    public function __construct()
    {
        $extConf = [];
        if (class_exists(ExtensionConfiguration::class)) {
            $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('daycarecenters');
        } elseif (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['daycarecenters'])) {
            $extConf = unserialize(
                $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['daycarecenters'],
                ['allowed_classes' => false]
            );
        }
        if (is_array($extConf) && count($extConf)) {
            // call setter method foreach configuration entry
            foreach ($extConf as $key => $value) {
                $methodName = 'set' . ucfirst($key);
                if (method_exists($this, $methodName)) {
                    $this->$methodName($value);
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getPoiCollectionPid(): int
    {
        return $this->poiCollectionPid;
    }

    /**
     * @param int $poiCollectionPid
     */
    public function setPoiCollectionPid($poiCollectionPid)
    {
        $this->poiCollectionPid = (int)$poiCollectionPid;
    }

    /**
     * @return int
     */
    public function getDefaultMaps2Category(): int
    {
        return $this->defaultMaps2Category;
    }

    /**
     * @param int $defaultMaps2Category
     */
    public function setDefaultMaps2Category($defaultMaps2Category)
    {
        $this->defaultMaps2Category = (int)$defaultMaps2Category;
    }
}
