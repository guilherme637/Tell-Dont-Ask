<?php

// Não estamos usando o conceito Tell, Don´t Ask
class ContaCorrente
{
    private string $agencia;
    private string $conta;
    private float $saldo = 0;

    //

    public function setSaldo(float $novoSaldo): void // apenas insere o saldo e não retorna nenhum dado
    {
        $this->saldo = $novoSaldo;
    }

    public function setDeposita(float $valorDeposito): void
    {
        $this->saldo += $valorDeposito;
    }

    public function getSaldo(): float // Apenas retorna o saldo e deixa explicito que esta retorando um float
    {
        return $this->saldo;
    }
}

// Nunca estancie a classe no mesmo arquivo do Objeto, so estou fazendo isso para fins explicativos

$contaCorrente = new ContaCorrente();
$contaCorrente->setSaldo(100);

$deposito = 20;

if ($deposito > 30) {
    $contaCorrente->setDeposita($deposito);
} else {
    echo 'O valor precisa ser positivo';
}
