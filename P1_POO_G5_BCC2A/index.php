<?php

require_once 'vendor/autoload.php';

use Unimar\Poo\Admin;
use Unimar\Poo\Avaliador;
use Unimar\Poo\Jogo;
use Unimar\Poo\Pessoa;

$usuarios = [];
$usuarios["admin@email.com"] = new Admin("Admin Mestre", "admin@email.com", "12345");
$usuarios["avaliador@email.com"] = new Avaliador("Avaliador", "avaliador@email.com", "1234");

$jogos = [];
$jogos[0] = new Jogo("Sally Face", "Aventuras sinistras de um garoto com rosto protético", 2016);
$jogos[1] = new Jogo("Nine Souls", "Jogo de ação-plataforma 2D", 2024);
$jogos[2] = new Jogo("Katana Zero", "Jogo de plataforma e ação neo-noir", 2019);

$usuarioLogado = null;

echo "Bem-vindo ao Sistema de Avaliação de Jogos!\n";

while (true) {
    if ($usuarioLogado === null) {
        echo "\n========== ACESSO AO SISTEMA ==========\n";
        echo "1. Fazer Login\n";
        echo "2. Cadastrar Novo Avaliador\n";
        echo "3. Sair\n";
        echo "=======================================\n";

        $entrada = readline("Escolha uma opção: ");
        $opcao = (int)$entrada;

        switch ($opcao) {
            case 1:
                echo "\n---------- Login ----------\n";
                $email = readline("Email: ");
                $senha = readline("Senha: ");

                if (isset($usuarios[$email]) && $usuarios[$email]->verificarSenha($senha)) {
                    $usuarioLogado = $usuarios[$email];
                    echo "\nLogin realizado com sucesso! Bem-vindo(a), " . $usuarioLogado->getNome() . "!\n";
                } else {
                    echo "\nEmail ou senha inválidos. Tente novamente.\n";
                }
                break;
            case 2:
                echo "\n---------- Cadastro de Novo Avaliador ----------\n";
                $nome = readline("Nome completo: ");
                $email = readline("Email: ");
                $senha = readline("Senha (mínimo 4 caracteres): ");

                if (isset($usuarios[$email])) {
                    echo "\nEste email já está cadastrado. Tente fazer o login.\n";
                } elseif (strlen($senha) < 4) {
                    echo "\nA senha deve ter no mínimo 4 caracteres.\n";
                } else {
                    $usuarios[$email] = new Avaliador($nome, $email, $senha);
                    echo "\nCadastro realizado com sucesso! Você já pode fazer o login.\n";
                }
                break;
            case 3:
                echo "\nSistema finalizado. Até logo!\n";
                exit;
            default:
                echo "\nOpção inválida! Tente novamente.\n";
                break;
        }
    } else {
        echo "\n========== MENU PRINCIPAL ==========\n";
        echo "Logado como: " . $usuarioLogado->getNome() . "\n";
        echo "-------------------------------------\n";

        if ($usuarioLogado instanceof Admin) {
            echo "1. Adicionar Novo Jogo\n";
        } elseif ($usuarioLogado instanceof Avaliador) {
            echo "1. Avaliar um Jogo\n";
        }
        echo "2. Ver Detalhes dos Jogos\n";
        echo "3. Logout\n";
        echo "=====================================\n";

        $entrada = readline("Escolha uma opção: ");
        $opcao = (int)$entrada;

        if ($usuarioLogado instanceof Admin) {
            switch ($opcao) {
                case 1:
                    echo "\n---------- Adicionar Novo Jogo ----------\n";
                    $nomeJogo = readline("Digite o nome do jogo: ");
                    $descricaoJogo = readline("Digite a descrição do jogo: ");
                    $anoJogoStr = readline("Digite o ano de lançamento: ");
                    $anoJogo = (int)$anoJogoStr;

                    $novoJogo = $usuarioLogado->adicionarJogo($nomeJogo, $descricaoJogo, $anoJogo);
                    $jogos[] = $novoJogo;
                    echo "\nJogo '$nomeJogo' adicionado com sucesso!\n";
                    break;
                case 2:
                    echo "\n========== Detalhes dos Jogos Cadastrados ==========\n";
                    foreach ($jogos as $jogo) {
                        $jogo->exibirDetalhes();
                    }
                    break;
                case 3:
                    $usuarioLogado = null;
                    echo "\nLogout realizado com sucesso.\n";
                    break;
                default:
                    echo "\nOpção inválida.\n";
                    break;
            }
        } elseif ($usuarioLogado instanceof Avaliador) {
            switch ($opcao) {
                case 1:
                    echo "\n---------- Avaliar um Jogo ----------\n";
                    foreach ($jogos as $indice => $jogo) {
                        echo "$indice. " . $jogo->titulo . "\n";
                    }
                    
                    $indiceJogoStr = readline("Escolha o número do jogo: ");
                    $indiceJogo = (int)$indiceJogoStr;

                    if (!isset($jogos[$indiceJogo])) {
                        echo "\nOpção de jogo inválida.\n";
                        break;
                    }
                    $jogoSelecionado = $jogos[$indiceJogo];
                    $notaStr = readline("Digite a nota para o jogo (ex: 9.5): ");
                    $nota = (float)$notaStr;
                    $recomenda = (strtolower(readline("Você recomenda? (s/n): ")) == 's');


                    $usuarioLogado->avaliarJogo($jogoSelecionado, $nota, $recomenda);
                    echo "\nAvaliação registrada com sucesso!\n";
                    break;
                case 2:
                    echo "\n========== Detalhes dos Jogos Cadastrados ==========\n";
                    foreach ($jogos as $jogo) {
                        $jogo->exibirDetalhes();
                    }
                    break;
                case 3:
                    $usuarioLogado = null;
                    echo "\nLogout realizado com sucesso.\n";
                    break;
                default:
                    echo "\nOpção inválida.\n";
                    break;
            }
        }
    }
}