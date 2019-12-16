<?php
class ClassCategoria {
    private $cod_categoria, $descricao;
                  
    function getCod_categoria() {
        return $this->cod_categoria;
    }
    function getDescricao() {
        return $this->descricao;
    }
    
    function setCod_categoria($cod_categoria) {
        $this->cod_categoria = $cod_categoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
