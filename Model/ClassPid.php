<?php
class ClassPid {
    private $cod_pid, $cod_ibge, $nome, $inep;

    function getCod_pid() {
        return $this->cod_pid;
    }
    function getCod_ibge() {
        return $this->cod_ibge;
    }        
    function getNome() {
        return $this->nome;
    }
    function getInep() {
        return $this->inep;
    }

   
    
	function setCod_pid($cod_pid) {
        $this->cod_pid = $cod_pid;
    }
    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setInep($inep) {
        $this->inep = $inep;
    }
}
