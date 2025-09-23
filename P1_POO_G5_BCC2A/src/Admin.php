<?php

namespace Unimar\Poo;

use Unimar\Poo\Jogo;
use Unimar\Poo\Pessoa;

class Admin extends Pessoa
{
    public function adicionarJogo(string $nome, string $descricao, int $ano): Jogo
    {
        echo "$this->nome adicionou o jogo $nome.\n";
        return new Jogo($nome, $descricao, $ano);
    }
}