<?php
/**
 * Description of ClassUacom
 * @author Carol
 */

class ClassUacom {
    private $cod_ibge, $data, $titulo, $relato;

    function getCod_ibge() {
        return $this->cod_ibge;
    }
	                  
    function getData() {
        return $this->data;
    }

    function getTitulo() {
        return $this->titulo;
    }
    function getRelato() {
        return $this->relato;
    }
   
    
	
    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

	function setData($data) {
        $this->data = $data;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    function setRelato($relato) {
        $this->relato = $relato;
    }
    
}
