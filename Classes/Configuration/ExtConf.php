<?php
declare(strict_types=1);
namespace JWeiland\Daycarecenters\Configuration;

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

use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class, which contains the configuration from ExtensionManager
 */
class ExtConf implements SingletonInterface
{
    /**
     * poi collection pid
     *
     * @var int
     */
    protected $poiCollectionPid = 0;

    /**
     * default maps2 category
     *
     * @var int
     */
    protected $defaultMaps2Category = 0;

    /**
     * constructor of this class
     * This method reads the global configuration and calls the setter methods
     */
    public function __construct()
    {
        // get global configuration
        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['daycarecenters']);
        if (is_array($extConf) && count($extConf)) {
            // call setter method foreach configuration entry
            foreach ($extConf as $key => $value) {
                $methodName = 'set' . ucfirst($key);
                if (method_exists($this, $methodName)) {
                    $this->$methodName((int)$value);
                }
            }
        }
    }

    /**
     * getter for poiCollectionPid
     *
     * @return int
     */
    public function getPoiCollectionPid()
    {
        return $this->poiCollectionPid;
    }

    /**
     * setter for poiCollectionPid
     *
     * @param int $poiCollectionPid
     * @return void
     */
    public function setPoiCollectionPid(int $poiCollectionPid)
    {
        $this->poiCollectionPid = $poiCollectionPid;
    }

    /**
     * getter for defaultMaps2Category
     *
     * @return int
     */
    public function getDefaultMaps2Category()
    {
        return $this->defaultMaps2Category;
    }

    /**
     * setter for defaultMaps2Category
     *
     * @param int $defaultMaps2Category
     * @return void
     */
    public function setDefaultMaps2Category(int $defaultMaps2Category)
    {
        $this->defaultMaps2Category = $defaultMaps2Category;
    }
}
