<?php
class ClassTelefone {
    private $cod_telefone, $cod_contato, $telefone, $tipo;

    function getCod_telefone() {
        return $this->cod_telefone;
    }
    function getCod_contato() {
        return $this->cod_contato;
    }
    function getTelefone() {
        return $this->telefone;
    }
    function getTipo() {
        return $this->tipo;
    }
    
    function setCod_telefone($cod_telefone) {
        $this->cod_telefone = $cod_telefone;
    }

    function setCod_contato($cod_contato) {
        $this->cod_contato = $cod_contato;
    }
    
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
