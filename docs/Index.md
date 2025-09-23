## Index
[⬅️ Voltar à página principal](../README.md)

O **index** é onde iremos realizar os testes de cada função criada, no formato de um pseudo-sistema de avaliação de jogos, sendo possível a criação de novos usuários, a adição de novos filmes, o login e logout de usuários, entre outras funcionalidades.

O código será explicado em blocos de código, sendo destacado o que alguns comandos realizam, o que é a função construída, o que ela exige, entre outros pontos relevantes para a explicação.

---
    
    <?php
    
**Tag de abertura** para indicar que o código é em php.

    require_once 'vendor/autoload.php';
    
Linha de código disponibilizada ao fim da inicialização do composer, sendo uma linha utilizada para carregar automaticamente o as classes e dependências contidas no projeto.

    use Unimar\Poo\Admin;
    use Unimar\Poo\Avaliador;
    use Unimar\Poo\Jogo;
    use Unimar\Poo\Pessoa;
    
Importação das classes **Pessoa, Jogo, Admin e Avaliador** para o **escopo do index.php**, permitindo a utilização direta.

    $usuarios = [];
    $usuarios["admin@email.com"] = new Admin("Admin Mestre", "admin@email.com", "12345");
    $usuarios["avaliador@email.com"] = new Avaliador("Avaliador", "avaliador@email.com", "1234");
    
Aqui, temos a inicialização vazia do array *$usuarios*, onde serão adicionados mais usuários com o decorrer da execução do index.php, caso o usuário deseje cadastrar um novo usuário.

Abaixo, temos dois novos usuários (Administrador do sistema e Avaliador) já definidos no início do código para uma execução mais rápida.

Eles utilizam a chamada direta das classes **Admin e Avaliador** para criar os novos usuários, inserindo os atributos necessários para isto (nome, email e senha).

    $jogos = [];
    $jogos[0] = new Jogo("Sally Face", "Aventuras sinistras de um garoto com rosto protético", 2016);
    $jogos[1] = new Jogo("Nine Souls", "Jogo de ação-plataforma 2D", 2024);
    $jogos[2] = new Jogo("Katana Zero", "Jogo de plataforma e ação neo-noir", 2019);
	
Aqui, temos a inicialização vazia do array *$jogos*, onde serão adicionados mais jogos com o decorrer da execução do index.php, caso o usuário Admin deseje cadastrar um novo usuário.

Abaixo, temos três novos jogos(Sally Face, Nine Souls e Katana Zero) já definidos no início do código para uma execução mais rápida.

Eles utilizam a chamada direta da classe *Jogo* para criar os novos jogos, inserindo os atributos necessários para isto (nome, descrição e ano de lançamento).

	$usuarioLogado = null;
	
Comando inserido para o controle de entrada e saída de usuários no sistema.

	echo "Bem-vindo ao Sistema de Avaliação de Jogos!\n";

Mensagem de boas vindas impressa no terminal com o comando echo.

	while (true) {
	
Loop para iniciar o menu do sistema. Ele é mantido enquanto for verdadeiro.

Dentro dele, podemos observar o condicional principal:

    if ($usuarioLogado === null) {
	// [RESTANTE DO CÓDIGO INSERIDO …]
    } else {
	// [RESTANTE DO CÓDIGO INSERIDO …]
    }
	
Nele, se o usuário logado estiver vazio, é aberto o menu de acesso ao sistema.

Se essa verificação não estiver correta, ou seja, a variável usuárioLogado estiver preenchida com algum valor, ele parte para o menu principal do sistema, que é o menu que o usuário logado (seja Admin ou Avaliador) irá visualizar.

Inserido dentro do bloco  *if ($usuarioLogado === null) { [CÓDIGO] }*, observamos inicialmente o seguinte bloco:

	echo "\n========== ACESSO AO SISTEMA ==========\n";
	        echo "1. Fazer Login\n";
	        echo "2. Cadastrar Novo Avaliador\n";
	        echo "3. Sair\n";
	        echo "=======================================\n";

Aqui, é impresso na tela quais as opções no menu para o usuário não logado.

        $entrada = readline("Escolha uma opção: ");
        $opcao = (int)$entrada;
		
Aqui ocorre a declaração da variável *$entrada*, que irá receber um valor em string e será convertido para um valor numérico inteiro na variável *$opcao*.

		switch ($opcao) {
		
Aqui, com o comando *switch case*, navegamos pelo menu definido anteriormente. E cada case é acessado de acordo com o valor inserido na variável *$opcao*. Abaixo, segue-se a explicação de cada um dos cases:

---

		case 1:
		        echo "\n--- Login ---\n";
		        $email = readline("Email: ");
		        $senha = readline("Senha: ");
		
		
		        if (isset($usuarios[$email]) && $usuarios[$email]->verificarSenha($senha)) {
		            $usuarioLogado = $usuarios[$email];
		            echo "\nLogin realizado com sucesso! Bem-vindo(a), " . $usuarioLogado->getNome() . "!\n";
		        } else {
		            echo "\nEmail ou senha inválidos. Tente novamente.\n";
		        }
		        break;
					
Aqui, no **case 1**, é executado o comando de fazer o login do usuário.

                $email = readline("Email: ");
                $senha = readline("Senha: ");
				
As variáveis *$email* e *$senha* recebem valores inseridos pelo próprio usuário através do comando *readline()*.

		if (isset($usuarios[$email]) && $usuarios[$email]->verificarSenha($senha)) {
		
Após isso, observamos o condicional *if (isset($usuarios[$email]) && $usuarios[$email]->verificarSenha($senha))*. Nesta linha, é verificado se o usuário já está registrado no sistema.

→ comando *isset* é utilizado para verificar se uma variável/posição em um array existe e não é nulo

→ Dessa maneira, o *isset* verifica se existe um usuário logado dentro do array usuarios a partir do email fornecido *E*, a partir do valor da variável *$email* dentro do array de *$usuários*, é chamado o método *verificarSenha* para verificar se a senha que o usuário digitou e armazenou na variável *$senha* corresponde com a senha armazenada conjuntamente com o email.

                    $usuarioLogado = $usuarios[$email];
                    echo "\nLogin realizado com sucesso! Bem-vindo(a), " . $usuarioLogado->getNome() . "!\n";
                } else {
                    echo "\nEmail ou senha inválidos. Tente novamente.\n";
                }
		    break;
			
→ Se o comando for **verdadeiro**, o usuário logado é atribuído a variável *$usuarioLogado*, e é impresso na tela a mensagem de que o login foi realizado com sucesso, e é chamado o método *getNome* da classe **Pessoa** (Também passado como herança para a classe Admin e Avaliador) para exibir o nome do usuário logado.

→ Assim, não é feita mais nenhuma verificação, e o **case 1** é finalizado com o comando *break*, retornando ao loop.

→ Se o comando for **falso**, é impresso na tela a mensagem de que o email ou senha são inválidos, e o **case 1** é finalizado através do comando *break*, retornando ao loop.

---

		case 2:
		        echo "\n--- Cadastro de Novo Avaliador ---\n";
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
						
Já no **case 2**, é executado o comando de cadastrar um novo usuário avaliador.

                $nome = readline("Nome completo: ");
                $email = readline("Email: ");
                $senha = readline("Senha (mínimo 4 caracteres): ");
				
As variáveis *$nome*, *$email* e *$senha* recebem valores inseridos pelo próprio usuário através do comando *readline()*.

                if (isset($usuarios[$email])) {
                    echo "\nEste email já está cadastrado. Tente fazer o login.\n";
                } elseif (strlen($senha) < 4) {
                    echo "\nA senha deve ter no mínimo 4 caracteres.\n";
                } else {
                    $usuarios[$email] = new Avaliador($nome, $email, $senha);
                    echo "\nCadastro realizado com sucesso! Você já pode fazer o login.\n";
                }
                break;
				
→ Aqui, o condicional *if* verifica se (utilizando o comando isset) o email inserido pelo usuário já está armazenado em alguma posição dentro do array *$usuarios*.

→ Se a condição for **verdadeira**, é impresso na tela que o email já está cadastrado no sistema, nem verificando as próximas condições e finalizando o case 2, retornando ao loop.

→ Se a condição for **falsa**, é verificado, em seguida, se a senha digitada pelo usuário possui menos de 4 caracteres (o comando *strlen* faz a contagem de caracteres dentro da variável).

→ Se a condição for **verdadeira**, é impresso na tela a mensagem de que a senha deve haver, no mínimo, 4 caracteres. Assim, não é feita mais nenhuma verificação e o case 2 é finalizado, retornando ao loop.

→ Se a condição for **falsa**, é realizado a ação de alocar este email ao array de *$usuarios*, criando um novo avaliador, com nome de usuário, email e senha correspondentes. Ao final, é impresso na tela a mensagem de que o cadastro foi realizado com sucesso e o **case 2** é finalizado, retornando ao loop.

		case 3:
		        echo "\nSistema finalizado. Até logo!\n";
		        exit;
No **case 3**, o sistema é finalizado e a execução do programa é finalizada através do comando *exit*.

            default:
                echo "\nOpção inválida! Tente novamente.\n";
                break;
				
Se nenhuma das cases forem acionadas, significa que o valor inserido foi inválido, e isto é indicado na mensagem impressa na tela, e o case é finalizado, retornando ao loop.

Agora, inserido dentro do bloco *else {[CÓDIGO]}*, após o bloco da linha *if ($usuarioLogado === null) { [CÓDIGO] }*, observamos inicialmente o seguinte bloco:

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
		
Neste bloco, o menu principal é apresentado quando a variável *$usuarioLogado* não possuir um valor vazio/null. Porém, os menus são apresentados de maneiras diferentes de acordo com o tipo do usuário.

Inicialmente, a apresentação inicial é igual para ambos os usuários, indicando que é o menu principal e imprimindo a mensagem de qual conta foi logada no sistema através da chamada do método *getNome* que a variável *$usuarioLogado* realiza.

O menu, ao invés de ser escrito com duas condicionais, foi utilizado o comando *instanceof* para a otimização da extensão do código.

→ *instanceof* é usado para determinar se um variável do PHP é uma objeto instanciado de uma certa classe.

Assim, o condicional verifica se a variável *$usuarioLogado* é instanciada na classe **Admin** ou na classe **Avaliador**.

→ Se for instanciada na classe **Admin**, é impresso como opção 1 para o usuário adicionar um novo jogo.

→ Se for instanciada na classe **Avaliador**, é impresso como opção 1 para o usuário adicionar uma nova avaliação a um jogo.

O restante das opções do menu (2. Ver Detalhes dos Jogos e 3. Logout) são iguais para ambos os tipos de usuários, por isso ele aparece logo após os condicionais.

        $entrada = readline("Escolha uma opção: ");
        $opcao = (int)$entrada;
		
Aqui ocorre a declaração da variável *$entrada*, que irá receber um valor em string e será convertido para um valor numérico inteiro na variável *$opcao*.

		 if ($usuarioLogado instanceof Admin) {
		            switch ($opcao) {
					
O condicional *if* verifica se o usuário logado está instanciado na classe **Admin**. Se for verdadeiro, é executado o *switch case*, que permite a navegação pelo menu definido anteriormente para o **usuário Admin**. E cada case é acessado de acordo com o valor inserido na variável *$opcao*. Abaixo, segue-se a explicação de cada um dos cases:

		 case 1:
		        echo "\n========== Adicionar Novo Jogo ==========\n";
		        $nomeJogo = readline("Digite o nome do jogo: ");
		        $descricaoJogo = readline("Digite a descrição do jogo: ");
		        $anoJogoStr = readline("Digite o ano de lançamento: ");
		        $anoJogo = (int)$anoJogoStr;
		
		
		        $novoJogo = $usuarioLogado->adicionarJogo($nomeJogo, $descricaoJogo, $anoJogo);
		        $jogos[] = $novoJogo;
		        echo "\nJogo '$nomeJogo' adicionado com sucesso!\n";
		        break;
							
No **case 1**, é executado o comando de adicionar um novo jogo ao sistema.

→ O usuário atribui valor para as variáveis *$nomeJogo, $descricaoJogo e $anoJogoStr*(esta variável irá receber um valor do tipo *string*, mas será convertida para um *valor numérico inteiro* para a variável *$anoJogo*).

→ A variável *$novoJogo* indica que o usuário logado irá chamar o método *adicionarJog*o com os respectivos atributos necessários. (o método está contido na classe **Admin**, e ele imprime na tela a mensagem de que o usuário logado adicionou um novo jogo, retornando uma nova instância na classe **Jogo**.)

→ Assim, o novo jogo é adicionado ao array *$jogos*, e é impressa na tela a mensagem de que o novo jogo foi adicionado com sucesso ao sistema, encerrando o **case 1** com o comando *break* e retornando ao loop.

                case 2:
                    echo "\n========== Detalhes dos Jogos Cadastrados ==========\n";
                    foreach ($jogos as $jogo) {
                        $jogo->exibirDetalhes();
                    }
                    break;
					
No **case 2**, é executado o comando de exibir os detalhes dos jogos cadastrados.

→ Assim, é utilizado o comando *foreac*h que, para cada elemento no *$jogosarray*, o código dentro das chaves é executado.

→ Em cada iteração, o elemento atual é atribuído à variável *$jogo*.

→ O objeto *$jogo* chama o método *exibirDetalhe*s (este método está contido dentro da classe **Jogo**, que exibe uma ficha completa do jogo, exibindo seu nome, descrição, ano de lançamento e média de avaliação).

→ Ao final do loop de *foreach*, o **case 2** é finalizado com o comando *break*, e o loop inicial é retomado (o loop do menu de Admin).

                case 3:
                    $usuarioLogado = null;
                    echo "\nLogout realizado com sucesso.\n";
                    break;
					
No **case 3**, é executado o comando de logout do usuário.

→ Para que o logout sera realizado, é preciso remover o valor dentro da variável *$usuarioLogado*, por isso definimos esta variável igual a null

→ Ao fim, é impresso na tela a mensagem de que o logout foi realizado com sucesso, e o **case 3** é finalizado pelo comando *break*, e o loop inicial é retomado(o loop do menu de Admin).

                default:
                    echo "\nOpção inválida.\n";
                    break;
					
Se nenhuma das cases forem acionadas, significa que o valor inserido foi inválido, e isto é indicado na mensagem impressa na tela, e o case é finalizado, retornando ao loop.

        } elseif ($usuarioLogado instanceof Avaliador) {
            switch ($opcao) {
			
Aqui, se a condição de antes for **falsa**, é verificado se o usuário logado está instanciado na classe **Avaliador**.

Se for **verdadeiro**, é executado o *switch case*, que permite a navegação pelo menu definido anteriormente para o **usuário Avaliador**. E cada case é acessado de acordo com o valor inserido na variável *$opcao*. Abaixo, segue-se a explicação de cada um dos cases:

                case 1:
                    echo "\n========== Avaliar um Jogo ==========\n";
                    foreach ($jogos as $indice => $jogo) {
                        echo "$indice. " . $jogo->nome . "\n";
                    }
                    $indiceJogoStr = readline("Escolha o número do jogo: ");
                    $indiceJogo = (int)$indiceJogoStr;


                    if (!isset($jogos[$indiceJogo])) {
                        echo "\nOpção de jogo inválida.\n";
                        break;
                    }
                    $jogoSelecionado = $jogos[$indiceJogo];
                    $nota = (float)readline("Digite a nota para o jogo (ex: 9.5): ");
                    $recomenda = (strtolower(readline("Você recomenda? (s/n): ")) == 's');


                    $usuarioLogado->avaliarJogo($jogoSelecionado, $nota, $recomenda);
                    echo "\nAvaliação registrada com sucesso!\n";
                    break;
					
No **case 1**, é executado o comando de avaliar um jogo.

→ Assim, é utilizado o comando *foreach* que, para cada elemento no array *$jogos*, o código dentro das chaves é executado.

→ Em cada iteração, o elemento atual é atribuído à variável *$jogo*.

→ Dentro das chaves do comando *foreach*, é impresso em qual posição o jogo se encontra dentro do array, além do nome do jogo que está contido neste índice.

→ Em seguida, o usuário digita o índice que ele deseja acessar para avaliar o jogo, sendo esse valor atribuído a variável *$indiceJogo*. Após, a variável é convertida do tipo *string* para o tipo *valor numérico inteiro*.

→ Em seguida, o condicional *if* verifica se o índice de jogo escolhido pelo usuário não está presente dentro do array *$jogos*. Se a condição for **verdadeira**, é impresso na tela que a opção é inválida, e o case 1 é finalizado com o comando break, e o loop é iniciado novamente (loop do menu de Avaliador).

→ Se a condição for **falsa**, o código continua normalmente, definindo o jogo selecionado pelo usuário *($jogoSelecionado)* como o jogo armazenado neste índice do array *$jogos*.

→ O usuário também atribui valores às variáveis *$nota* e *$recomenda* (*$nota* é recebido primeiramente como uma *string*, sendo convertida em um *valor número flutuante*, já *$recomend*a utiliza o comando *strtolower* para que a resposta seja um *caractere minúsculo* e faz uma comparação, onde, se digitado **s**, o *valor booleano* da variável *$recomenda* torna-se **true**, enquanto se digitado **n**, é **false**).

→ Ao fim do bloco de código, o usuário logado chama o método *avaliarJogo*, atribuindo os atributos necessários para finalizar a criação desta avaliação.

→ Assim, uma mensagem é impressa no fim da tela, indicando que a avaliação foi feita com sucesso, e o **case 1** é finalizado com o comando *break*, voltanddo ao loop inicial do menu de Avaliador.

                case 2:
                    echo "\n========== Detalhes dos Jogos Cadastrados ==========\n";
                    foreach ($jogos as $jogo) {
                        $jogo->exibirDetalhes();
                    }
                    break;
					
No **case 2**, é executado o comando de exibir os detalhes dos jogos cadastrados.

→ Assim, é utilizado o comando *foreac*h que, para cada elemento no *$jogosarray*, o código dentro das chaves é executado.

→ Em cada iteração, o elemento atual é atribuído à variável *$jogo*.

→ O objeto *$jogo* chama o método *exibirDetalhe*s (este método está contido dentro da classe **Jogo**, que exibe uma ficha completa do jogo, exibindo seu nome, descrição, ano de lançamento e média de avaliação).

→ Ao final do loop de foreach, o **case 2** é finalizado com o comando *break*, e o loop inicial é retomado (o loop do menu de Admin).

                case 3:
                    $usuarioLogado = null;
                    echo "\nLogout realizado com sucesso.\n";
                    break;
					
No **case 3**, é executado o comando de logout do usuário.

→ Para que o logout sera realizado, é preciso remover o valor dentro da variável *$usuarioLogado*, por isso definimos esta variável igual a *null*.

→ Ao fim, é impresso na tela a mensagem de que o logout foi realizado com sucesso, e o **case 3** é finalizado pelo comando *break*, e o loop inicial é retomado(o loop do menu de Avaliador).

                default:
                    echo "\nOpção inválida.\n";
                    break;
					
Se nenhuma das cases forem acionadas, significa que o valor inserido foi inválido, e isto é indicado na mensagem impressa na tela, e o case é finalizado, retornando ao loop.
