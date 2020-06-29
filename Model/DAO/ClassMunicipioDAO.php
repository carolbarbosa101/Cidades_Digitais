<?php

require_once 'Conexao.php';
class ClassMunicipioDAO {
    
    public function cadastrar(ClassMunicipio $cadastrarMunicipio) {

        //var_dump($cadastrarMunicipio);
        //die();

        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO municipio (cod_ibge, nome_municipio, populacao, uf, regiao, cnpj, dist_capital, endereco, numero, complemento, bairro, idhm, latitude, longitude) values (?,?, ?, ?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarMunicipio->getCod_ibge());
            $stmt->bindValue(2, $cadastrarMunicipio->getNome_municipio());
            $stmt->bindValue(3, $cadastrarMunicipio->getPopulacao());
            $stmt->bindValue(4, $cadastrarMunicipio->getUf());
            $stmt->bindValue(5, $cadastrarMunicipio->getRegiao());
            $stmt->bindValue(6, $cadastrarMunicipio->getCnpj());
            $stmt->bindValue(7, $cadastrarMunicipio->getDist_capital());
            $stmt->bindValue(8, $cadastrarMunicipio->getEndereco());
            $stmt->bindValue(9, $cadastrarMunicipio->getNumero());
            $stmt->bindValue(10, $cadastrarMunicipio->getComplemento());
            $stmt->bindValue(11, $cadastrarMunicipio->getBairro());
            $stmt->bindValue(12, $cadastrarMunicipio->getIdhm());
            $stmt->bindValue(13, $cadastrarMunicipio->getLatitude());
            $stmt->bindValue(14, $cadastrarMunicipio->getLongitude());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassMunicipio $editarMunicipio) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE municipio
            SET nome_municipio = ?, populacao = ?, uf = ?, regiao = ?, cnpj = ?, dist_capital = ?, endereco =? , numero = ?, complemento = ?, bairro = ?, idhm = ?, latitude = ?, longitude = ?
            WHERE cod_ibge = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarMunicipio->getNome_municipio());
            $stmt->bindValue(2, $editarMunicipio->getPopulacao());
            $stmt->bindValue(3, $editarMunicipio->getUf());
            $stmt->bindValue(4, $editarMunicipio->getRegiao());
            $stmt->bindValue(5, $editarMunicipio->getCnpj());
            $stmt->bindValue(6, $editarMunicipio->getDist_capital());
            $stmt->bindValue(7, $editarMunicipio->getEndereco());
            $stmt->bindValue(8, $editarMunicipio->getNumero());
            $stmt->bindValue(9, $editarMunicipio->getComplemento());
            $stmt->bindValue(10, $editarMunicipio->getBairro());
            $stmt->bindValue(11, $editarMunicipio->getIdhm());
            $stmt->bindValue(12, $editarMunicipio->getLatitude());
            $stmt->bindValue(13, $editarMunicipio->getLongitude());

            $stmt->bindValue(14, $editarMunicipio->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarMunicipiosPag($inicio, $maximo){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ibge, nome_municipio, populacao, uf, regiao, cnpj, dist_capital, endereco, numero, complemento, bairro, idhm, latitude, longitude FROM municipio ORDER BY nome_municipio ASC LIMIT $inicio,$maximo";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarMunicipios(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ibge, nome_municipio, populacao, uf, regiao, cnpj, dist_capital, endereco, numero, complemento, bairro, idhm, latitude, longitude FROM municipio ORDER BY nome_municipio ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarMunicipio(ClassMunicipio $visualizarMunicipio){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_ibge, nome_municipio, populacao, uf, regiao, cnpj, dist_capital, endereco, numero, complemento, bairro, idhm, latitude, longitude 
            FROM municipio 
            WHERE cod_ibge = ? 
            LIMIT 1";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarMunicipio->getCod_ibge());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Buscar todos os municipios para exibir em tabelas que precisa
     * do codigo ibge, ou seja tabela de relacionamento com municipio
     */
    public function todosMunicipios(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(nome_municipio, ' - ', cod_ibge) municipioIbge,
            cod_ibge, nome_municipio FROM municipio ORDER BY nome_municipio ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarMunicipio(ClassMunicipio $apagarMunicipio) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM municipio WHERE cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarMunicipio->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
