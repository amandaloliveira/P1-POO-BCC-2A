<?php

namespace Unimar\Poo;

use Unimar\Poo\Avaliacao;

class Jogo
{
    public string $titulo;
    public string $descricao;
    public int $ano;
    public array $avaliacoes = [];
    public float $mediaDeAvaliacoes = 0.0;

    public function __construct(string $titulo, string $descricao, int $ano)
    {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->ano = $ano;
    }

    public function adicionarAvaliacao(Avaliacao $avaliacao): void
    {
        $this->avaliacoes[] = $avaliacao;
        $this->calcularMediaAvaliacoes();
    }

    public function calcularMediaAvaliacoes(): void
    {
        $totalNotas = 0;
        $numeroDeAvaliacoes = count($this->avaliacoes);

        foreach ($this->avaliacoes as $avaliacao) {
            $totalNotas += $avaliacao->getNota();
        }

        $this->mediaDeAvaliacoes = $totalNotas / $numeroDeAvaliacoes;
    }

    public function exibirDetalhes(): void
    {
        echo "\n---------- Ficha do Jogo ----------\n";
        echo "Nome: $this->titulo\n";
        echo "Descrição: $this->descricao\n";
        echo "Ano de Lançamento: $this->ano\n";
        echo "Média de Avaliações: " . number_format($this->mediaDeAvaliacoes, 2) . "\n";
        echo "---------------------\n";
    }
}