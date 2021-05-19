<?php
namespace App\Doctrine;

use App\Doctrine\Entity\Curso;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();

$curso = new Curso();
$curso->setNome($argv[1]);

$entityManager->persist($curso);

$entityManager->flush();

echo $curso->getNome() . " Inserido com sucesso \n\n";