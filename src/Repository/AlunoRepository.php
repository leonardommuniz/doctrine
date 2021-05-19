<?php

namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    
    public function buscarCursosPorAluno()
    {
        // $entityManager = $this->getEntityManager();

        // $classeAluno = Aluno::class;
        // $dql ="SELECT a, t, c FROM $classeAluno a JOIN a.telefones t JOIN a.cursos c";
        // $query = $entityManager->createQuery($dql);

        $builder = $this->createQueryBuilder('a')
                    ->join('a.telefones','t')
                    ->join('a.cursos','c')
                    ->addSelect('t')
                    ->addSelect('c')
                    ->getQuery();
        
        return $builder->getResult();
    }

}
