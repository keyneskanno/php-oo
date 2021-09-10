<?php

class Conta
{
    private $cpfTitular;
    private $nomeTitular;
    private $saldo;
    private static $numeroDeContas = 0;

    public function __construct(string $nomeTitular, string $cpfTitular)
    {
        $this->nomeTitular = $this->validaNomeTitular($nomeTitular);
        $this->cpfTitular = $cpfTitular;
        $this->saldo = 0;
        echo 'Criando uma nova conta de ' . $this->nomeTitular . PHP_EOL;

        Conta::$numeroDeContas++;

    }
    public function __destruct()
    {
        if(self::$numeroDeContas >2){
            echo "Há mais de uma conta ativa";
        }
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
    public function recuperarCpfTitular(): string
    {
        return $this->cpfTitular;
    }
    public function recuperarNomeTitular(): string
    {
        return $this->nomeTitular;
    }
    private function validaNomeTitular($nomeTitular): string{
        if( strlen($nomeTitular) < 5){
            echo 'Por favor insira o nome completo do titular';
            exit;
        }
        return $nomeTitular;
    }

    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }



}