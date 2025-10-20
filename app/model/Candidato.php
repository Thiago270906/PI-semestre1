<?php

class Candidato extends Aluno
{
    private Candidatura $candidatura;
    private int $qtdVotos = 0;

    public function __construct(int $id, string $nome, Turma $turma, Candidatura $candidatura)
    {
        parent::__construct($id, $nome, $turma);
        $this->candidatura = $candidatura;
        $this->qtdVotos = 0;
    }

    public function getCandidatura(): Candidatura
    {
        return $this->candidatura;
    }

    public function getQtdVotos(): int
    {
        return $this->qtdVotos;
    }

    public function incrementarVoto(): void
    {
        $this->qtdVotos++;
    }
}