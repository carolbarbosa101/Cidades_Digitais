<?php

class ClassEmpenho {
    private $id_empenho, $cod_empenho, $cod_previsao_empenho, $data, $contador;


    function getId_empenho() {
        return $this->id_empenho;
    } 
    function getCod_empenho() {
        return $this->cod_empenho;
    }       
    function getCod_previsao_empenho() {
        return $this->cod_previsao_empenho;
    }
    function getData() {
        return $this->data;
    }
    function getContador() {
        return $this->contador;
    }
    
    function setId_empenho($id_empenho) {
        $this->id_empenho = $id_empenho;
    }
	
    function setCod_empenho($cod_empenho) {
        $this->cod_empenho = $cod_empenho;
    }

	function setCod_previsao_empenho($cod_previsao_empenho) {
        $this->cod_previsao_empenho = $cod_previsao_empenho;
    }

    function setData($data) {
        $this->data = $data;
    }
    function setContador($contador) {
        $this->contador = $contador;
    }
    
    
}