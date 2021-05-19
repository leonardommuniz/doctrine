<?php

namespace App\Doctrine;

use App\Doctrine\Entity\Aluno;
use App\Doctrine\Entity\Telefone;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();

$aluno = new Aluno();
$aluno->setNome($argv[1]);

for ($i=2; $i < $argc; $i++) { 
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();  
    $telefone->setNumero($numeroTelefone);

    $aluno->addTelefone($telefone);

}

$entityManager->persist($aluno);

$entityManager->flush();

echo $aluno->getNome() . " Inserido com sucesso \n\n";