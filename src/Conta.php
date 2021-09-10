<?php

class Conta
{

    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;


        self::$numeroDeContas++;

    }
    public function __destruct()
    {
        self::$numeroDeContas--;

    }

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

    public function defineCpfTitular(string $cpf): void
    {
        $this->cpfTitular = $cpf;
    }

    public function defineNomeTitular(string $nome): void
    {
        $this->nomeTitular = $nome;
    }

    public function recuperarSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaNomeTitular(): string {
        return $this->titular->recuperaNome();
    }
    public function recuperaCpfTitular(): string {
        return $this->titular->recuperaCpf();
    }
    public function recuperaTelefone():string {
        return $this->titular->recuperaTelefone();
    }





    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }




}