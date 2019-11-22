<?php
/**
 * Description of ClassContato
 * @author Carol
 */

class ClassContato {
private $cod_contato, $cnpj, $cod_ibge, $nome, $email, $funcao;

    function getCod_contato() {
        return $this->cod_contato;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getCod_ibge() {
        return $this->cod_ibge;
    }
    function getNome() {
        return $this->nome;
    }
    function getEmail() {
        return $this->email;
    }
    function getFuncao() {
        return $this->funcao;
    }   
    

    function setCod_contato($cod_contato) {
        $this->cod_contato = $cod_contato;
    }
    function setCnpj($cnpj) {
        if ($cnpj == 0){
            $this->cnpj = null;
        }
        else{
            $this->cnpj = $cnpj;
        }
    }
    function setCod_ibge($cod_ibge) {
        if($cod_ibge ==0){
            $this->cod_ibge = null;    
        }
        else{
            $this->cod_ibge = $cod_ibge;
        }
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setEmail($email) {
        $this->email = $email;
    }
	function setFuncao($funcao) {
        $this->funcao = $funcao;
    }
}
