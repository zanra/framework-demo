<?php

/**
 * This file is part of the Zanra Framework package.
 *
 * (c) Targalis Group <targalisgroup@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DBManager;

use Zanra\Framework\Application\Application;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Zanra Framework
 *
 * @author Targalis
 *
 */
class Doctrine
{
    private static $_instance = null;

    private $entityManager;

    private function __Construct()
    {
        $application    = Application::getInstance();
        $resources      = $application->getResources();
        $paths          = array('mvc/src/Entity');
        $isDevMode      = false;

        $dbParams = array(
            'driver'   => $resources->database->driver,
            'user'     => $resources->database->user,
            'password' => $resources->database->password,
            'dbname'   => $resources->database->name,
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }

    public function getEntityManager()
    {
       return $this->entityManager;
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Doctrine();
        }

        return self::$_instance;
    }
}
