<?php

class ContaCorrenteTellDontAsk
{
// estamos usando o conceito Tell, Don´t Ask

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
        if ($deposito < 30 && $deposito < 0) {
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
// Nunca estancie a classe no mesmo arquivo do Objeto, so estou fazendo isso para fins explicativos

$guilherme = new ContaCorrenteTellDontAsk();
$guilherme->depositar(200);
$guilherme->depositar(200);
echo $guilherme->extrato();

