<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . "/vendor/autoload.php";

$entityManager = \DBManager\Doctrine::getInstance()->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
