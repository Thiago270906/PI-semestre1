<?php

class Aluno {
    private int $id;
    private string $nome;
    private Turma $turma;

    public function __construct(int $id, string $nome, Turma $turma)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->turma = $turma;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTurma(): Turma
    {
        return $this->turma;
    }
}
