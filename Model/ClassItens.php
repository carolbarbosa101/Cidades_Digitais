<?php
class ClassItens {
    private $cod_item, $cod_tipo_item, $cod_natureza_despesa, $cod_classe_empenho, $descricao, $unidade;
                  
    function getCod_item() {
        return $this->cod_item;
    }

    function getCod_tipo_item() {
        return $this->cod_tipo_item;
    }

    function getCod_natureza_despesa() {
        return $this->cod_natureza_despesa;
    }
    function getCod_classe_empenho() {
        return $this->cod_classe_empenho;
    }
    function getDescricao() {
        return $this->descricao;
    }
    function getUnidade() {
        return $this->unidade;
    }
    

    function setCod_item($cod_item) {
        $this->cod_item = $cod_item;
    }

    function setCod_tipo_item($cod_tipo_item) {
        $this->cod_tipo_item = $cod_tipo_item;
    }

    function setCod_natureza_despesa($cod_natureza_despesa) {
        $this->cod_natureza_despesa = $cod_natureza_despesa;
    }
    function setCod_classe_empenho($cod_classe_empenho) {
        $this->cod_classe_empenho = $cod_classe_empenho;
    }
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }
    
}
