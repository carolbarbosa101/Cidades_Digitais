<?php
class ClassEtapa {
    private $cod_etapa, $descricao, $duracao, $depende, $delay, $setor_resp;

    function getCod_etapa() {
        return $this->cod_etapa;
    }
	                  
    function getDescricao() {
        return $this->descricao;
    }

    function getDuracao() {
        return $this->duracao;
    }
    function getDepende() {
        return $this->depende;
    }
    function getDelay() {
        return $this->delay;
    }
    function getSetor_resp() {
        return $this->setor_resp;
    }
   
    
	
    function setCod_etapa($cod_etapa) {
        $this->cod_etapa = $cod_etapa;
    }

	function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }
    function setDepende($depende) {
        $this->depende = $depende;
    }
    function setDelay($delay) {
        $this->delay = $delay;
    }
    function setSetor_resp($setor_resp) {
        $this->setor_resp = $setor_resp;
    }
    
}
