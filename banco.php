<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta();
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);
$primeiraConta->defineCpfTitular('111.222.333-44');
$primeiraConta->defineNomeTitular('Keynes K');

echo 'Nome: ';
echo $primeiraConta->recuperarNomeTitular();
echo ' - CPF:';
echo $primeiraConta->recuperarCpfTitular();
echo ' - Saldo:';
echo $primeiraConta->recuperarSaldo();