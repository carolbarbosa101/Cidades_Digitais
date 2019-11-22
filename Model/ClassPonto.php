<?php

class ClassPonto {
    private $cod_ponto, $cod_categoria, $cod_ibge, $cod_pid, $endereco, $numero;
    private $complemento, $bairro, $cep, $latitude, $longitude;
                  
    function getCod_ponto() {
        return $this->cod_ponto;
    }
    function getCod_categoria() {
        return $this->cod_categoria;
    }
    function getCod_ibge() {
        return $this->cod_ibge;
    }
    function getCod_pid() {
        return $this->cod_pid;
    }
    function getEndereco() {
        return $this->endereco;
    }
    function getNumero() {
        return $this->numero;
    }
    function getComplemento() {
        return $this->complemento;
    }
    function getBairro() {
        return $this->bairro;
    }
    function getCep() {
        return $this->cep;
    }
    function getLatitude() {
        return $this->latitude;
    }
    function getLongitude() {
        return $this->longitude;
    }

    
    
    function setCod_ponto($cod_ponto) {
        $this->cod_ponto = $cod_ponto;
    }
    function setCod_categoria($cod_categoria) {
        $this->cod_categoria = $cod_categoria;
    }
    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }
    function setCod_pid($cod_pid) {
        $this->cod_pid = $cod_pid;
    }
    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    function setNumero($numero) {
        $this->numero = $numero;
    }
    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
    function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    function setCep($cep) {
        $this->cep = $cep;
    }
    function setLatitude($latitude) {
        $this->latitude = str_replace(',','.',$latitude);
    }
    function setLongitude($longitude) {
        $this->longitude = str_replace(',','.',$longitude);
    }
    
}
