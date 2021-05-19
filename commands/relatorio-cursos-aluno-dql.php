<?php

use App\Doctrine\Entity\Aluno;
use App\Doctrine\Entity\Telefone;
use Doctrine\DBAL\Logging\DebugStack;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);


$classeAluno = Aluno::class;
$dql ="SELECT a, t, c FROM $classeAluno a JOIN a.telefones t JOIN a.cursos c";
$query = $entityManager->createQuery($dql);

$alunoList = $query->getResult();


foreach ($alunoList as $aluno) {
echo"\n----------------------------------------------";


    $telefones = $aluno
    ->getTelefones()
    ->map(function (Telefone $telefone){
        return $telefone->getNumero();
    })->toArray();

    echo "\nID: {$aluno->getId()}
    \nNome: {$aluno->getNome()}\n
    \nTelefones: ". implode(', ', $telefones) . "\n\n";
 
    $cursos = $aluno->getCursos()->toArray();
    
    foreach ($cursos as $curso) {
        echo "\tId do Curso:" . $curso->getId();
        echo "\n\tNome do Curso:" . $curso->getNome();
    }
    
}

foreach ($debugStack->queries as $queryInfo) {
    echo "\n\n".$queryInfo['sql'] . "\n";
}