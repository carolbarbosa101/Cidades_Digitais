<?php

class ClassFatura {
    private $cod_natureza_despesa, $descricao;




    function getCod_natureza_despesa() {
        return $this->cod_natureza_despesa;
    }       
    function getDescricao() {
        return $this->descricao;
    }
    
    
	
    function setCod_natureza_despesa($cod_natureza_despesa) {
        $this->cod_natureza_despesa = $cod_natureza_despesa;
    }

	function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}