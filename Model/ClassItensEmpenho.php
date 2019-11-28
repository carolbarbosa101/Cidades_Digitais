<?php

class ClassItensEmpenho {
    private $cod_empenho, $cod_item, $cod_tipo_item, $cod_previsao_empenho, $valor, $quantidade;




    function getCod_empenho() {
        return $this->cod_empenho;
    }       
    function getCod_item() {
        return $this->cod_item;
    }
    function getCod_tipo_item() {
        return $this->cod_tipo_item;
    }
    function getCod_previsao_empenho() {
        return $this->cod_previsao_empenho;
    }
    function getValor() {
        return $this->valor;
    }
    function getQuantidade() {
        return $this->quantidade;
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
    function setCod_previsao_empenho($cod_previsao_empenho) {
        $this->cod_previsao_empenho = $cod_previsao_empenho;
    }
    function setValor($valor) {
        $this->valor = $valor;
    }
    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    
    
}