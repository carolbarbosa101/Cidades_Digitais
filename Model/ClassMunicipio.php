<?php

class ClassMunicipio {
    private $cod_ibge, $nome_municipio, $populacao, $uf, $regiao, $cnpj, $dist_capital, $endereco, $numero, $complemento, $bairro, $idhm, $latitude, $longitude;
                  
    function getCod_ibge() {
        return $this->cod_ibge;
    }

    function getNome_municipio() {
        return $this->nome_municipio;
    }

    function getPopulacao() {
        return $this->populacao;
    }
    function getUf() {
        return $this->uf;
    }
    function getRegiao() {
        return $this->regiao;
    }
    function getCnpj() {
        return $this->cnpj;
    }
    function getDist_capital() {
        return $this->dist_capital;
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
    function getIdhm() {
        return $this->idhm;
    }
    function getLatitude() {
        return $this->latitude;
    }
    function getLongitude() {
        return $this->longitude;
    }

    
    

    function setCod_ibge($cod_ibge) {
        $this->cod_ibge = $cod_ibge;
    }

    function setNome_municipio($nome_municipio) {
        $this->nome_municipio = $nome_municipio;
    }

    function setPopulacao($populacao) {
        $this->populacao = $populacao;
    }
    function setUf($uf) {
        $this->uf = $uf;
    }
    function setRegiao($regiao) {
        $this->regiao = $regiao;
    }
    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    function setDist_capital($dist_capital) {
        $this->dist_capital = $dist_capital;
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
    function setIdhm($idhm) {
        $this->idhm = str_replace(',','.',$idhm);
    }
    function setLatitude($latitude) {
        $this->latitude = str_replace(',','.',$latitude);
    }
    function setLongitude($longitude) {
        $this->longitude = str_replace(',' , '.',$longitude);
    }
    
}
