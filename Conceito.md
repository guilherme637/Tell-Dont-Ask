Muito se diz sobre conceitos de programação e quando pensamos nisso parece ser algo complexo ou impossível de aprender, mas hoje eu venho mostrar que princípios de programação é possível aprender sim e que nem todos são complexos.

 O princípio Tell, Don't Ask é um dos conceitos mais essenciais e um dos mais fáceis na programação Orientada a Objetos, pois ele difere muito um código procedural para o Orientado a Objeto e abre as portas para aprender outros conceitos. Nós devemos dizer (tell) ao objeto o que queremos, e não (don’t) pedir (ask) pelo dado necessário e depois agir.

 Suponhamos que estamos desenvolvendo uma aplicação para um banco, e a conta corrente tem a sua regra de negócio que só aceita deposito acima de 30 reais.

````
Class ContaCorrente
{
    private string $agencia;
    private string $conta;
    private float $saldo = 0; 
    //     
   /*apenas insere o saldo e não retorna nenhum dado*/
   public function setSaldo(float $novoSaldo): void 
    {
        $this->saldo = $novoSaldo;
    } 
    /* deposita um valor */
    public function setDeposita(float $valorDeposito): void
    {
        $this->saldo += $valorDeposito;
    }
     /*Apenas retorna o saldo e deixa explicito que esta retorando um float*/
     public function getSaldo(): float 
    {
        return $this->saldo;
    }
}

$contaCorrente = new ContaCorrente();
$contaCorrente->setSaldo(100);
$deposito = 20;
// verifica se $deposito é maior que 30
if ($deposito > 30) {
  // Pede pelo dado (ask)
  $saldoAtual = $contaCorrente->getSaldo();
  $contaCorrente->setSaldo( + $deposito);
} else {
  echo 'O valor precisa ser positivo';
}
````
Dessa forma pode parecer que estamos escrevendo código Orientado a Objeto, mas é onde nos enganamos, estamos escrevendo um código procedural (Acredite, também achava que isso era Orientado a Objeto), pois estamos escrevendo cada processo que será executado e isso fere o conceito do Tell, Don´t Ask, pois ele diz que o objeto precisa fornecer a funcionalidade necessária sem que nós (usuário do objeto) precisemos pedir por seus dados. Sendo assim estamos ferindo um dos pilares mais importante que é o encapsulamento. Quando abordamos essa forma de escrita, estamos acessando a propriedade ($saldo) diretamente e por mais que ela esteja privada (private) nós conseguimos ter acessa a ela pelo método setSaldo() e precisando verificar diretamente na classe para depositar e não é isso que queremos. Outro ponto também que podemos identificar é sobre repetição de código. Sempre que precisarmos usar o setSaldo() precisaremos copiar o bloco de verificação, para podermos inserir o deposito.

Agora irei mostrar como o Tell, Don't Ask é aplicado e como é benéfico para o nosso objeto e para o encapsulamento.
````
<?php// estamos usando o conceito Tell, Don´t Ask

class ContaCorrente
{
    private string $agencia;
    private string $conta;
    private float $saldo;

    public function __construct()
    {
        //
        $this->saldo = 0;
    }  

    public function depositar(float $deposito): void
    {
         if ($deposito < 30) {
             echo 'Você precisa depositar um valor acima de 30 reais';
             exit();
        }

        $this->saldo += $deposito;
    }

    public function extrato(): string
    {
        return 'Saldo disponivel: '. $this->saldo;
    }
}

/*Nunca estancie a classe no mesmo arquivo do Objeto, so estou fazendo isso para 
fins explicativos*/

$contaCorrente = new ContaCorrenteTellDontAsk();

$contaCorrente->depositar(200);
````
Dessa forma o código ficou bem mais organizado e protegido e sem código repetido, pois agora não acessamos o atributo diretamente e nem fazemos a verificação na classe e sim no objeto e não estamos acessando o atributo diretamente ganhando encapsulamento. O que está acontecendo aqui é, nós estamos dizendo o que o objeto precisa fazer (depositar) sem ficar perguntando (getSaldo()), sendo assim nós não sabemos o que depositar() faz por baixo dos panos, e também não sabemos qual a regra de negócio esta sendo aplicada, mas dizemos para o objeto o que queremos que seja executado. Esse é o conceito Tell, Don't Ask onde deixamos toda a responsabilidade para objeto executar a lógicas de negócio e nós apenas solicitar a ação.