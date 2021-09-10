<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';

$titularContaPrimeira = new Titular("000.222.333-11",'Kanno');
$titularContaPrimeira->salvaTelefone('3499999-3232');
$primeiraConta = new Conta($titularContaPrimeira);

$primeiraConta->depositar(500);
$primeiraConta->sacar(300);
//$primeiraConta->defineCpfTitular('111.222.333-44');
//$primeiraConta->defineNomeTitular('Keynes K');
$titularContaSegunda = new Titular('111.333.222-44','keynes kan');
$titularContaSegunda->salvaTelefone('3499992-2320');
$segundaConta = new Conta($titularContaSegunda);
echo 'Saldo: ' . $segundaConta->recuperarSaldo() . PHP_EOL;

echo 'Nome: ';
echo $primeiraConta->recuperaNomeTitular();
echo ' - CPF:';
echo $primeiraConta->recuperaCpfTitular();
echo ' - Saldo:';
echo $primeiraConta->recuperarSaldo();
echo ' - Telefone:';
echo $primeiraConta->recuperaTelefone();

echo PHP_EOL . "Número de Contas: " . Conta::recuperaNumeroDeContas();

//exemplo para destrutor - garbage collector
//new Conta('keynesan','222.333.222-12');
//echo Conta::recuperaNumeroDeContas();