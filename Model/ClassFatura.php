<?php

class ClassFatura {
    private $num_nf, $cod_ibge, $dt_nf;




    function getNum_nf() {
        return $this->num_nf;
    }       
    function getCod_ibge() {
        return $this->cod_ibge;
    }
    function getDt_nf() {
        return $this->dt_nf;
    }
    
    
	
    function setNum_nf($num_nf) {
        $this->num_nf = $num_nf;
    }

	function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

    function setDt_nf($dt_nf) {
        $this->dt_nf = $dt_nf;
    }
    
    
}