<?php

namespace Unimar\Poo;

abstract class Pessoa
{

    protected string $nome;
    protected string $email;
    private string $senha;

    public function __construct(string $nome, string $email, string $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function verificarSenha(string $senha): bool
    {
        return $this->senha === $senha;
    }
}
