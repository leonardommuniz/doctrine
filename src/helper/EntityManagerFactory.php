<?php
namespace App\Doctrine\helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

abstract class EntityManagerFactory 
{
    public static function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir .'/src'],
            true,
        );
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir. '/var/data/banco.sqlite'
        ];
        return EntityManager::create($connection,$config);
    }

}