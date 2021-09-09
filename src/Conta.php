<?php

class Conta
{
    private $cpfTitular;
    private $nomeTitular;
    private $saldo;

    public function sacar(float $valorSacar)
    {
        if($valorSacar > $this->saldo){
            echo "Saldo indisponível";
        } else {
            $this->saldo -= $valorSacar;
        }

    }
    public function depositar(float $valorDepositar): void {
        if($valorDepositar < 0){
            echo "Não é possível depositar valores negativos";
        } else {
            $this->saldo +=$valorDepositar;
        }

    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if($valorATransferir > $this->saldo){
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);

    }

    public function verSaldo(): float
    {
        return $this->saldo;
    }

}