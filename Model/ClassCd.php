<?php
/** Description of ClassCd @author Carol */

class ClassCd {
    private $cod_ibge, $cod_lote, $os_pe, $data_pe, $os_imp, $data_imp;

    function getCod_ibge() {
        return $this->cod_ibge;
    }
	                  
    function getCod_lote() {
        return $this->cod_lote;
    }

    function getOs_pe() {
        return $this->os_pe;
    }
    function getData_pe() {
        return $this->data_pe;
    }
    function getOs_imp() {
        return $this->os_imp;
    }
    function getdata_imp() {
        return $this->data_imp;
    }
    
	
    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

	function setCod_lote($cod_lote) {
        $this->cod_lote = $cod_lote;
    }

    function setOs_pe($os_pe) {
        $this->os_pe = $os_pe;
    }
    function setData_pe($data_pe) {
        $this->data_pe = $data_pe;
    }
    function setOs_imp($os_imp) {
        $this->os_imp = $os_imp;
    }
    function setData_imp($data_imp) {
        $this->data_imp = $data_imp;
    }

}