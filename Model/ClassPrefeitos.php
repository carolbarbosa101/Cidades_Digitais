<?php

class ClassPrefeitos {
    private $cod_prefeito, $cod_ibge, $nome, $cpf, $rg, $partido, $exercicio;
                  
	function getCod_prefeito() {
        return $this->cod_prefeito;
    }
	function getCod_ibge() {
        return $this->cod_ibge;
    }
    function getNome() {
        return $this->nome;
    }
    function getCpf() {
        return $this->cpf;
    }
    function getRg() {
        return $this->rg;
    }
    function getPartido() {
        return $this->partido;
    }
    function getExercicio() {
        return $this->exercicio;
    }
    




	function setCod_prefeito($cod_prefeito) {
        $this->cod_prefeito = $cod_prefeito;
    }

    function setCod_Ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
	}
	
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    function setRg($rg) {
        $this->rg = $rg;
    }
    function setPartido($partido) {
        $this->partido = $partido;
    }
    function setExercicio($exercicio) {
		$this->exercicio = $exercicio; 
	}

    
}
