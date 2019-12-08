<?php

class ClassAssunto {
    private $cod_assunto, $descricao;
                  
    function getCod_assunto() {
        return $this->cod_assunto;
    }

    function getDescricao() {
        return $this->descricao;
    }
    
    

    function setCod_assunto($cod_assunto) {
        $this->cod_assunto = $cod_assunto;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

   

   

    
}
