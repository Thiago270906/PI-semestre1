<?php

class Voto{
    private int $id;
    private Aluno $aluno;
    private Candidato $candidato;

    public function __construct(Aluno $aluno, Candidato $candidato)
    {
        $this->aluno = $aluno;
        $this->candidato = $candidato;
    }
}