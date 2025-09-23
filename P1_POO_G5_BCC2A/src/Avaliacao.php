<?php

namespace Unimar\Poo;

use Unimar\Poo\Jogo;
use Unimar\Poo\Avaliador;

class Avaliacao
{
    public Avaliador $avaliador;
    public Jogo $jogo;
    public float $nota;
    public bool $recomenda;

    public function __construct(Avaliador $avaliador, Jogo $jogo, float $nota, bool $recomenda)
    {
        $this->avaliador = $avaliador; 
        $this->jogo = $jogo;
        $this->nota = $nota;
        $this->recomenda = $recomenda;
    }

    public function getNota(): float
    {
        return $this->nota;
    }
}