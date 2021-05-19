<?php

use App\Doctrine\Entity\Aluno;
use App\Doctrine\Entity\Telefone;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();

$classeAluno = Aluno::class;

$dql = "SELECT a FROM $classeAluno a";

$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {

    $telefones = $aluno
    ->getTelefones()
    ->map(function (Telefone $telefone){
        return $telefone->getNumero();
    })->toArray();

    echo "ID: {$aluno->getId()}
    \nNome: {$aluno->getNome()}
    \nTelefones: ". implode(', ', $telefones) . "\n\n";
    
}
