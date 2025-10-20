<?php

class Candidatura{
    private int $id;
    private string $dataInicio;
    private string $dataFim;
    private Turma $turma;
    private string $descricao;

    public function __construct(string $dataInicio, string $dataFim, Turma $turma, string $descricao)
    {
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->turma = $turma;
        $this->descricao = $descricao;
    }
}