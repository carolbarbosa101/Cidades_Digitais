<?php
/**
 * Description of ClassUacom
 * @author Carol
 */

class ClassUacomAssunto {
    private $cod_ibge, $data, $cod_assunto;

    function getCod_ibge() {
        return $this->cod_ibge;
    }
	                  
    function getData() {
        return $this->data;
    }

    function getCod_assunto() {
        return $this->cod_assunto;
    }

    
	
    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

	function setData($data) {
        $this->data = $data;
    }

    function setCod_assunto($cod_assunto) {
        $this->cod_assunto = $cod_assunto;
    }

    
}
