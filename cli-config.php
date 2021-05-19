<?php

use App\Doctrine\helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);