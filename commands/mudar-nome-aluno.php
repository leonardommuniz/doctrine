<?php

use App\Doctrine\Entity\Aluno;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);
$aluno = $alunoRepository->findOneBy(["id"=>$argv[1]]);
$aluno->setNome($argv[2]);

$entityManager->flush();

echo $aluno->getNome()." inserido com sucesso \n\n";