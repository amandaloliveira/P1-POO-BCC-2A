
A classe Admin é a classe filha da classe mãe Pessoa. Ela é uma classe que não possui outros aributos além da classe Pessoa, apenas um método.

O código será explicado em blocos de código, sendo destacado o que alguns comandos realizam, o que é a função construída, o que ela exige, entre outros.

---

    <?php
    namespace Mandis\Poo;

**Tag de abertura** para indicar que o código é em php.

**Namespace** é como se fosse uma pasta virtual para organizar os arquivos contidos nela, evitando o conflito de nomenclatura.

    use Unimar\Poo\Jogo;
    use Unimar\Poo\Pessoa;

Importação das classes **Pessoa** e **Jogo** para o escopo da classe **Admin**, permitindo a utilização direta.

    class Avaliador extends Pessoa

**Admin** é uma **classe filha** de **Pesso**a, herdando as informações contidas na classe (sejam atributos e funções).

    public function adicionarJogo(string $nome, string $descricao, int $ano): Jogo

A função é **pública** para ser acessada por qualquer classe ou arquivo.

É uma função para adicionar um novo jogo e para ser executada normalmente, deve receber três parâmetros: nome do jogo (uma string), a descrição (outra string) e o ano de lançamento (um número inteiro).

Ao final da execução da função, é retornada uma instância (jogo) do tipo jogo(classe criada).

    echo "$this->nome adicionou o jogo $nome.\n";

Este comando exibe uma mensagem no console, indicando que o administrador (referenciado por *$this->nome*) adicionou um novo jogo (referenciado por *$nome*).

    return new Jogo($nome, $descricao, $ano);
   
Ao final da função, é retornada uma nova instância da classe Jogo com os atributos nome, descrição e ano fornecidos. Esta nova instância representa o jogo recém-adicionado.
