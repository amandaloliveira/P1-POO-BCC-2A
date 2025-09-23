<?php

namespace Unimar\Poo;

use Unimar\Poo\Jogo;
use Unimar\Poo\Avaliacao;
use Unimar\Poo\Pessoa;

class Avaliador extends Pessoa
{
    public function avaliarJogo(Jogo $jogo, float $nota, bool $recomenda): Avaliacao
    {
        $avaliacao = new Avaliacao($this, $jogo, $nota, $recomenda);
        $jogo->adicionarAvaliacao($avaliacao);
        return $avaliacao;
    }
   
}
