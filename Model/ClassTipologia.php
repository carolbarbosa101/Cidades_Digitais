<?php
class ClassTipologia {
    private $cod_tipologia, $descricao;
                  
    function getCod_tipologia() {
        return $this->cod_tipologia;
    }

    function getDescricao() {
        return $this->descricao;
    }
    
    

    function setCod_tipologia($cod_tipologia) {
        $this->cod_tipologia = $cod_tipologia;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
