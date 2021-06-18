<?php

namespace App\Doctrine\Entity;


use App\Doctrine\Entity\Curso;
use App\Doctrine\Entity\Telefone;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="App\Doctrine\Repository\AlunoRepository")
 */
class Aluno 
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer", nullable=false, unique=true)
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;

    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove","persist"}, fetch="EAGER")
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos", cascade={"persist"})
     */
    private $cursos;

    public function __construct()
    {
      $this->telefones = new ArrayCollection();
      $this->cursos = new ArrayCollection();  
    }

    public function getId (): int
    {
        return $this->id;
    }
    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }
    public function getNome(): string
    {
        return $this->nome;
    } 

    public function addTelefone(Telefone $telefone){
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones() : Collection
    {
        return $this->telefones;
    }

    /**
     * @return Collections
     */
    public function getCursos()
    {
        return $this->cursos;
    }

  
    public function addCursos(Curso $cursos): self
    {
        if (!$this->cursos->contains($cursos)) {
            $this->cursos->add($cursos);
            $cursos->addAlunos($this);
        }
        
        return $this;
    }

    public function removeCursos(Curso $cursos): self
    {
        if ($this->cursos->contains($cursos)) {
           $this->cursos->removeElement($cursos);
        }
        
        return $this;
    }
}