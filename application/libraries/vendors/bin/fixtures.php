<?php

require '/var/www/admin/application/libraries/vendors/autoload.php';
require '/var/www/admin/application/config/defines.php';
require '/var/www/admin/application/libraries/doctrine.php';


$doctrine = new Doctrine();

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

$loaderFixtures = new Loader();
$loaderFixtures->loadFromDirectory(FIXTURES_DIR);

$purger = new ORMPurger();
$executor = new ORMExecutor($doctrine->em, $purger);
$executor->execute($loaderFixtures->getFixtures());