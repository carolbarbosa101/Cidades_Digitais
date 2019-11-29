<?php

class ClassPrevisaoEmpenho {
    private $cod_previsao_empenho, $cod_lote, $cod_natureza_despesa, $data, $tipo, $ano_referencia;
                  
	function getCod_previsao_empenho() {
        return $this->cod_previsao_empenho;
    }
	function getCod_lote() {
        return $this->cod_lote;
    }
    function getCod_natureza_despesa() {
        return $this->cod_natureza_despesa;
    }
    function getData() {
        return $this->data;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getAno_referencia() {
        return $this->ano_referencia;
    }
    


	function setCod_previsao_empenho($cod_previsao_empenho) {
        $this->cod_previsao_empenho = $cod_previsao_empenho;
    }

    function setCod_lote($cod_lote) {
        $this->cod_lote = $cod_lote;
	}
	
    function setCod_natureza_despesa($cod_natureza_despesa) {
        $this->cod_natureza_despesa = $cod_natureza_despesa;
    }
    function setData($data) {
        $this->data = $data;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setAno_referencia($ano_referencia) {
        $this->ano_referencia = $ano_referencia;
    }

    
}
