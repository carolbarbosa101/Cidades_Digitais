<?php

class ClassOtb {
    private $cod_otb, $dt_pgto;         
    function getCod_otb() {
        return $this->cod_otb;
    }

    function getDt_pgto() {
        return $this->dt_pgto;
    }
    

    function setCod_otb($cod_otb) {
        $this->cod_otb = $cod_otb;
    }

    function setDt_pgto($dt_pgto) {
        $this->dt_pgto = $dt_pgto;
    }

}
