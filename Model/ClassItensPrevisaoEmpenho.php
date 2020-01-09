<?php

class ClassItensPrevisaoEmpenho {
    private $cod_previsao_empenho, $cod_item, $cod_tipo_item, $cod_lote , $valor, $quantidade;




    function getCod_lote() {
        return $this->cod_lote;
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
    
	
    function setCod_lote($cod_lote) {
        $this->cod_lote = $cod_lote;
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