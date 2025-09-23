# Classe Jogo
[⬅️ Voltar à página principal](../README.md)

A classe Jogo é uma classe que permite a criação da instância **Jogo**, além de realizar algumas funcções, como receber uma avaliação e calcular a média de notas de determinado jogo.

O código será explicado em blocos de código, sendo destacado o que alguns comandos realizam, o que é a função construída, o que ela exige, entre outros.

---

    use Unimar\Poo\Avaliacao;

Jogos usa a Classe **Avaliação**.

    class Jogo
    {
        public string $titulo;
        public string $descricao;
        public int $ano;
        public array $avaliacoes = [];
        public float $mediaDeAvaliacoes = 0.0;

Criação da classe **Jogos** e criação das variáveis: nome, descrição, ano de lançamento, avaliações e média de avaliações.

    public function __construct(string $titulo, string $descricao, int $ano)
        {
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->ano = $ano;
        }

Criação da **função pública __construct** é uma função pública que inicializa o objeto, atribuindo aos atributos da classe os valores recebidos como parâmetros.

    public function receberAvaliacao(Avaliacao $avaliacao): void
        {
            $this->avaliacoes[] = $avaliacao;
            $this->calcularMediaAvaliacoes();
        }

Criação da função **receber nota**, que adiciona o valor atual de nota a um array de notas, e em seguida chama a função **calcular média**.

    public function calcularMediaAvaliacoes(): void
        {
            $totalNotas = 0;
            $numeroDeAvaliacoes = count($this->avaliacoes);
    
    
            foreach ($this->avaliacoes as $avaliacao) {
                $totalNotas += $avaliacao->getNota();
            }
    
    
            $this->mediaDeAvaliacoes = $totalNotas / $numeroDeAvaliacoes;
         }

Criação da função **calcular média**, a função inicializa o total de notas como 0 e salva o número de avaliações na variável **$numeroDeAvaliacoes**, em seguida ele lê o valor de cada avaliação salva em avaliações e adiciona ao **$totalNotas**, apos isso a função atribui a **mediaDeAvaliacoes** o valor de **totalNotas** dividido por **numeroDeAvaliacoes**.

    public function exibirDetalhes(): void
        {
            echo "\n---------- Ficha do Jogo ----------\n";
            echo "Nome: $this->titulo\n";
            echo "Descrição: $this->descricao\n";
            echo "Ano de Lançamento: $this->ano\n";
            echo "Média de Avaliações: " . number_format($this->mediaDeAvaliacoes, 2) . "\n";
            echo "---------------------\n";
        }

Criação da **função pública mostrar jogo**, essa função basicamente escreve no prompt os atributos do objeto.
