<?php

class ClassFaturaOtb {
    private $cod_otb, $num_nf, $cod_ibge;
                  
    function getCod_otb() {
        return $this->cod_otb;
    }

    function getNum_nf() {
        return $this->num_nf;
    }
    function getCod_ibge() {
        return $this->cod_ibge;
    }
    




    function setCod_otb($cod_otb) {
        $this->cod_otb = $cod_otb;
    }

    function setNum_nf($num_nf) {
        $this->num_nf = $num_nf;
    }

    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }


    
}
