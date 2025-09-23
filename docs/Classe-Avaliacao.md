# Classe Avaliação
[⬅️ Voltar à página principal](../README.md)

A classe Avaliacao serve para representar a avaliação de um Jogo feita por um **Avaliador**. Ela é uma classe que relaciona esses dois objetos e armazena os dados específicos da avaliação, como a nota e a recomendação.

O código será explicado em blocos de código, sendo destacado o que alguns comandos realizam, o que é a função construída, o que ela exige, entre outros.

---

    <?php
    namespace Unimar\Poo;

A 1ª linha é a tag de abertura para indicar que o código é em PHP. Já na 2ª linha é utilizado o **namespace**, que representa uma pasta virtual para organizar as classes contidas nela, evitando o conflito de nomenclatura.

    use Unimar\Poo\Jogo;
    use Unimar\Poo\Avaliador;

As linhas com o comando **use** servem para "importar" outras classes. Isso permite que usemos os nomes **Jogo** e **Avaliador** diretamente, sem a necessidade de escrever o caminho completo do **namespace** toda vez.

    class Avaliacao
    {
        public Avaliador $avaliador;
        public Jogo $jogo;
        public float $nota;
        public bool $recomenda; 
    
      [...]
    }

Aqui é possível observar a estrutura **"[assessor] [tipo] [variável]"**.

O **assessor** corresponde ao tipo de acesso. Neste caso, é o **public**, pois as propriedades podem ser acessadas de qualquer lugar do código (dentro ou fora da classe).

O **tipo** corresponde ao tipo da variável. Neste caso, temos:

- **Avaliador** e **Jogo**: tipos que representam objetos de suas respectivas classes.
- **float**: casas decimais. **bool**: um valor verdadeiro ou falso.
  
A **variável** corresponde ao nome que atribuímos à propriedade.

      public function __construct(Avaliador $avaliador, Jogo $jogo, float $nota, bool $recomenda)

**public function__construct**, é uma função que, por ser pública, pode ser acessada por qualquer classe, subclasse ou algo de fora. O método construtor é chamado automaticamente ao se criar uma nova instância/objeto da classe **Avaliacao**. Ele exige que sejam fornecidos um objeto Avaliador, um objeto Jogo, uma nota e um valor para recomenda.


    {
        $this->avaliador = $avaliador;
        $this->jogo = $jogo;
        $this->nota = $nota;
        $this->recomenda = $recomenda;
    }

A pseudo-variável $this está disponível quando um método é chamado a partir de um contexto de um objeto. $this é o valor do objeto chamado. Neste trecho, o código atribui os valores passados para o construtor às propriedades correspondentes do objeto que está sendo criado.

    public function getNota(): float
    {
        return $this->nota;
    }

Função pública para retornar a nota que foi atribuída na avaliação. A declaração : float indica que o valor retornado por esta função será sempre do tipo float.
