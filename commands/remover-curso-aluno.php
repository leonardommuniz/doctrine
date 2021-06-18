<?php

use App\Doctrine\Entity\Aluno;
use App\Doctrine\Entity\Curso;
use App\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

/**
 * @var Aluno $aluno
 */
$aluno = $entityManager->find(Aluno::class,$idAluno);

/**
 * @var Curso $curso
 */
$curso = $entityManager->find(Curso::class,$idCurso);

$aluno->removeCursos($curso);

$entityManager->flush();