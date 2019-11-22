<?php
class ClassEtapas {
    private $cod_ibge, $cod_etapa, $dt_inicio, $dt_fim, $responsavel;
                  
    function getCod_ibge() {
        return $this->cod_ibge;
    }

    function getCod_etapa() {
        return $this->cod_etapa;
    }

    function getDt_inicio() {
        return $this->dt_inicio;
    }
    function getDt_fim() {
        return $this->dt_fim;
    }
    function getResponsavel() {
        return $this->responsavel;
    }
   
    

    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

    function setCod_etapa($cod_etapa) {
        $this->cod_etapa = $cod_etapa;
    }

    function setDt_inicio($dt_inicio) {
        $this->dt_inicio = $dt_inicio;
    }
    function setDt_fim($dt_fim) {
        $this->dt_fim = $dt_fim;
    }
    function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }
    
}
