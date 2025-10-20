<?php

class Ata{
    private int $id;
    private Votacao $votacao;
    private string $presidente;
    private string $vice;

    public function __construct(Votacao $votacao, string $presidente, string $vice)
    {
        $this->votacao = $votacao;
        $this->presidente = $presidente;
        $this->vice = $vice;
    }
}