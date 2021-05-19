<?php

use App\Doctrine\Entity\Aluno;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();
foreach ($alunoList as $aluno) {

    
 
    $cursos = $aluno->getCursos()->toArray();
    
    foreach ($cursos as $curso) {
        echo $curso->getNome();
    }

    // echo "ID: {$aluno->getId()}
    // \nNome: {$aluno->getNome()}\n\n";
}