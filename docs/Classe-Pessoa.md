# Classe Pessoa
[⬅️ Voltar à página principal](../README.md)

A classe pessoa é a **classe mãe** das classes filhas **Admin** e **Avaliador**. Ela é uma classe que não possui métodos, apenas atributos.

O código será explicado em blocos de código, sendo destacado o que alguns comandos realizam, o que é a função construída, o que ela exige, entre outros pontos relevantes para a explicação.

---
    <?php
    namespace Mandis\Poo;
    
A 1ª linha é a tag de abertura para indicar que o código é em php.

Já na 2ª linha é utilizado o **namespace**, que representa uma pasta virtual para organizar os arquivos contidos nela, evitando o conflito de nomenclatura.

    abstract class Pessoa{
      protected string $nome;
      protected string $email;
      private string $senha;

      [...]
    }
    
Aqui é possível observar a estrutura **"[*assessor*] [*tipo*] [*variável*]"**.

O **assessor** corresponde a qual o tipo de acesso definido. Neste caso, é o **protected**, pois apenas a classe e as subclasses/classes filhas podem acessar. Já o tipo **private** indica que a variável pode ser acessada apenas pela classe.

O **tipo** corresponde ao tipo da variável. Neste caso, o tipo é definido como uma string, ou seja, uma cadeia de caracteres.

Já a **variável** corresponde ao nome que iremos atribuir à variável. Neste caso, atribuímos os nomes *nome*, *email* e *senha*.

    public function __construct(string $nome, string $email, string $senha)
    
**Função pública** construct, que é uma função que, por ser pública, pode ser acessada por qualquer classe, subclasse ou algo de fora.

O método construtor é chamado automaticamente ao se criar uma nova instância/objeto da classe.

        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;

A pseudo-variável *$this* está disponível quando um método é chamado a partir de um contexto de um objeto. *$this* é o valor do objeto chamado.

    public function getNome(): string
    {
        return $this->nome;
    }
    
Função pública para retornar o nome do usuário avaliador.

      public function autenticarSenha(string $senha): bool
      {
          return $this->senha === $senha;
      }
    }

Função pública para retornar a autenticação de senha do usuário avaliador.
