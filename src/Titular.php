<?php

class Titular
{
    private string $cpf;
    private string $nome;
    private string $telefone;

    public function __construct(string $cpf, string $nome)
    {

        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function recuperaCpf()
    {
        return $this->cpf;
    }


    /**
     * @return string
     */
    public function recuperaNome()
    {
        return $this->nome;
    }
    private function validaNomeTitular($nomeTitular): string{
        if( strlen($nomeTitular) < 5){
            echo 'Por favor insira o nome completo do titular';
            exit;
        }
        return $nomeTitular;
    }
    public function recuperaTelefone(): string{
        return $this->telefone;
    }
    public function salvaTelefone(string $telefone): void{
        $this->telefone = $telefone;
    }



}