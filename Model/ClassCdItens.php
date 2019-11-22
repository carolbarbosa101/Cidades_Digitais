<?php

class ClassCdItens {
    private $cod_ibge, $cod_item, $cod_tipo_item, $quantidade_previsto, $quantidade_projeto_executivo, $quantidade_termo_instalacao;

    function getCod_ibge() {
        return $this->cod_ibge;
    }       
    function getCod_item() {
        return $this->cod_item;
    }
    function getCod_tipo_item() {
        return $this->cod_tipo_item;
    }
    function getQuantidade_previsto() {
        return $this->quantidade_previsto;
    }
    function getQuantidade_projeto_executivo() {
        return $this->quantidade_projeto_executivo;
    }
    function getQuantidade_termo_instalacao() {
        return $this->quantidade_termo_instalacao;
    }
   
    
	
    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

	function setCod_item($cod_item) {
        $this->cod_item = $cod_item;
    }

    function setCod_tipo_item($cod_tipo_item) {
        $this->cod_tipo_item = $cod_tipo_item;
    }
    function setQuantidade_previsto($quantidade_previsto) {
        $this->quantidade_previsto = $quantidade_previsto;
    }
    function setQuantidade_projeto_executivo($quantidade_projeto_executivo) {
        $this->quantidade_projeto_executivo = $quantidade_projeto_executivo;
    }
    function setQuantidade_termo_instalacao($quantidade_termo_instalacao) {
        $this->quantidade_termo_instalacao = $quantidade_termo_instalacao;
    }
    
}