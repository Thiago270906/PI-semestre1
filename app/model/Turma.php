<?php

class Turma {
    private int $id;
    private string $periodo;
    private string $curso;

    public function __construct(int $id, string $periodo, string $curso)
    {
        $this->id = $id;
        $this->periodo = $periodo;
        $this->curso = $curso;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPeriodo(): string
    {
        return $this->periodo;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }
}