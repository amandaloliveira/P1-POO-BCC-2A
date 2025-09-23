## Classe Avaliador
[⬅️ Voltar à página principal](../README.md)

A classe **avaliador** é a **classe filha** da **classe mãe Pessoa**, ou seja, ela é uma classe que **herda** as informações contidas na classe Pessoa, seja seus atributos e/ou métodos. Ela é uma classe que não possui outros atributos além da classe Pessoa, apena um novo método.

O código será explicado em blocos de código, sendo destacado o que alguns comandos realizam, o que é a função construída, o que ela exige, entre outros pontos relevantes para a explicação.

---

    <?php
    namespace Mandis\Poo;
    
A 1ª linha é a tag de abertura para indicar que o código é em php.

Já na 2ª linha é utilizado o **namespace**, que representa uma pasta virtual para organizar os arquivos contidos nela, evitando o conflito de nomenclatura.

    use Unimar\Poo\Jogo;
    use Unimar\Poo\Avaliacao;
    use Unimar\Poo\Pessoa;
    
Importação das classes Pessoa, Jogo e Avaliacao para o escopo da classe Avaliador, permitindo a utilização direta.

    class Avaliador extends Pessoa
    
Avaliador é uma classe filha de Pessoa, herdando as informações contidas na classe (sejam atributos e funções).

    public function avaliarJogo(Jogo $jogo, float $nota, bool $recomenda): Avaliacao
    
A função é *pública* para ser acessada por qualquer classe ou arquivo.
É uma função para avaliar jogo e para ser executada normalmente, deve receber alguns parâmetros: um objeto da classe jogo, uma nota flutuante e uma recomendação booleana (true or false).
Ao final da execução da função, é retornada uma instância (avaliação) do tipo avaliação (classe criada).

        $avaliacao = new Avaliacao($this, $jogo, $nota, $recomenda);
        
A instância/objeto *$avaliacao* cria uma nova instância do tipo Avaliacao (classe) com os atributos requisitados.
O *$this* refere-se ao próprio avaliador, e lista os métodos necessários para se executar a função (O avaliador, o jogo, a nota e a recomendação).

        $jogo->adicionarAvaliacao($avaliacao);
        
Após criar a avaliação, o objeto *$jogo* escolhido pelo avaliador chama o método *adicionarAvaliacao($avaliacao)* para adicionar a nova avaliação criada e armazenada na variável *$avaliacao*.

        return $avaliacao;
        
Ao fim da função, é retornada a nova avaliação criada pelo usuário avaliador.
