<?php

class Votacao{
    private int $id;
    private Candidatura $candidatura;
    private string $dataInicio;
    private string $dataFim;

    public function __construct(Candidatura $candidatura, string $dataInicio, string $dataFim)
    {
        $this->candidatura = $candidatura;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
    }
}