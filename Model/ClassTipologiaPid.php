<?php
class ClassTipologiaPid {
    private $cod_pid, $cod_tipologia;
             
    
    function getCod_pid() {
        return $this->cod_pid;
    }
    function getCod_tipologia() {
        return $this->cod_tipologia;
    }

    

    function setCod_pid($cod_pid) {
        $this->cod_pid = $cod_pid;
    }
    function setCod_tipologia($cod_tipologia) {
        $this->cod_tipologia = $cod_tipologia;
    }

}
