<?php

class Usuario {
    private int $id;
    private string $email;
    private string $senha;
    private Aluno $aluno;
    private string $tipo;

    public function __construct(int $id, string $email, string $senha, Aluno $aluno, string $tipo)
    {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->aluno = $aluno;
        $this->tipo = $tipo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}
