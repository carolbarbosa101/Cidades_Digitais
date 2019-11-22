<?php
class ClassLoteItens {
    private $cod_lote, $cod_item, $cod_tipo_item, $preco;
                  
    function getCod_lote() {
        return $this->cod_lote;
    }
    function getCod_item() {
        return $this->cod_item;
    }
    function getCod_tipo_item() {
        return $this->cod_tipo_item;
    }
    function getPreco() {
        return $this->preco;
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
    function setPreco($preco) {
        $this->preco = $preco;
    } 
}