<?php

class ClassItensFatura {
    private $num_nf, $cod_ibge, $cod_empenho, $cod_item;
    private $cod_tipo_item, $valor, $quantidade;


    function getNum_nf() {
        return $this->num_nf;
    }       
    function getCod_ibge() {
        return $this->cod_ibge;
    }
    function getCod_empenho() {
        return $this->cod_empenho;
    }
    function getCod_item() {
        return $this->cod_item;
    }       
    function getCod_tipo_item() {
        return $this->cod_tipo_item;
    }
    function getValor() {
        return $this->valor;
    }
    function getQuantidade() {
        return $this->quantidade;
    }
   
	
    function setNum_nf($num_nf) {
        $this->num_nf = $num_nf;
    }

	function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

    function setCod_empenho($cod_empenho) {
        $this->cod_empenho = $cod_empenho;
    }
    
    function setCod_item($cod_item) {
        $this->cod_item = $cod_item;
    }

	function setCod_tipo_item($cod_tipo_item) {
        $this->cod_tipo_item = $cod_tipo_item;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
}