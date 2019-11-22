<?php
/** Description of ClassEntidade  @author Carol */

class ClassEntidade {
    private $cnpj, $nome, $endereco, $numero, $bairro, $cep, $nome_municipio, $uf, $observacao;
                  
    function getCnpj() {
        return $this->cnpj;
    }
    function getNome() {
        return $this->nome;
    }
    function getEndereco() {
        return $this->endereco;
    }
    function getNumero() {
        return $this->numero;
    }
    function getBairro() {
        return $this->bairro;
    }
    function getCep() {
        return $this->cep;
    }
    function getNome_municipio() {
        return $this->nome_municipio;
    }

    function getUf() {
        return $this->uf;
    }
    function getObservacao() {
        return $this->observacao;
    }

    
    
    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    function setNumero($numero) {
        $this->numero = $numero;
    }
    function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    function setCep($cep) {
        $this->cep = $cep;
    }
    function setNome_municipio($nome_municipio) {
        $this->nome_municipio = $nome_municipio;
    }
    function setUf($uf) {
        $this->uf = $uf;
    }
    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }  
}
