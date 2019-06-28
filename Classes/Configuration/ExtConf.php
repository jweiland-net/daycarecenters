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
     * @var int
     */
    protected $poiCollectionPid = 0;

    /**
     * @var int
     */
    protected $defaultMaps2Category = 0;

    public function __construct()
    {
        // get global configuration
        $extConf = unserialize(
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['daycarecenters'],
            ['allowed_classes' => false]
        );
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
