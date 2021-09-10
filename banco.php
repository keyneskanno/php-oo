<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta('Kanno', "000.222.333-11");

$primeiraConta->depositar(500);
$primeiraConta->sacar(300);
//$primeiraConta->defineCpfTitular('111.222.333-44');
//$primeiraConta->defineNomeTitular('Keynes K');

$segundaConta = new Conta('Saitama J', '444.222.111-11');
echo 'Saldo: ' . $segundaConta->recuperarSaldo() . PHP_EOL;

echo 'Nome: ';
echo $primeiraConta->recuperarNomeTitular();
echo ' - CPF:';
echo $primeiraConta->recuperarCpfTitular();
echo ' - Saldo:';
echo $primeiraConta->recuperarSaldo();

echo PHP_EOL . "Número de Contas: " . Conta::recuperaNumeroDeContas();

new Conta('keynesan','222.333.222-12');
echo Conta::recuperaNumeroDeContas();