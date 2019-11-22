<?php
/** Description of ClassReajuste  @author Carol */

class ClassReajuste {
    private $ano_ref, $cod_lote, $percentual;
     

    function getAno_ref() {
        return $this->ano_ref;
    }

    function getCod_lote() {
        return $this->cod_lote;
    }

    function getPercentual() {
        return $this->percentual;
    }

    

    function setAno_ref($ano_ref) {
        $this->ano_ref = $ano_ref;
    }

    function setCod_lote($cod_lote) {
        $this->cod_lote = $cod_lote;
    }

    function setPercentual($percentual) {
        $this->percentual = $percentual;
    }
}
