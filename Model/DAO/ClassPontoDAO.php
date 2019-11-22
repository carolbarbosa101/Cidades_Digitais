<?php

require_once 'Conexao.php';
class ClassPontoDAO {
    
    public function cadastrar(ClassPonto $cadastrarPonto) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO ponto (cod_ponto, cod_categoria, cod_ibge, cod_pid, endereco, numero, complemento, bairro, cep, latitude, longitude) values (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarPonto->getCod_ponto());
            $stmt->bindValue(2, $cadastrarPonto->getCod_categoria());
            $stmt->bindValue(3, $cadastrarPonto->getCod_ibge());
            $stmt->bindValue(4, $cadastrarPonto->getCod_pid());
            $stmt->bindValue(5, $cadastrarPonto->getEndereco());
            $stmt->bindValue(6, $cadastrarPonto->getNumero());
            $stmt->bindValue(7, $cadastrarPonto->getComplemento());
            $stmt->bindValue(8, $cadastrarPonto->getBairro());
            $stmt->bindValue(9, $cadastrarPonto->getCep());
            $stmt->bindValue(10, $cadastrarPonto->getLatitude());
            $stmt->bindValue(11, $cadastrarPonto->getLongitude());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassPonto $editarPonto) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE ponto SET  endereco = ?, numero = ?, complemento = ?, bairro = ?, cep = ?, latitude = ?, longitude = ?
            WHERE cod_ponto = ? AND cod_ibge = ? AND cod_categoria = ? AND cod_pid = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarPonto->getEndereco());
            $stmt->bindValue(2, $editarPonto->getNumero());
            $stmt->bindValue(3, $editarPonto->getComplemento());
            $stmt->bindValue(4, $editarPonto->getBairro());
            $stmt->bindValue(5, $editarPonto->getCep());
            $stmt->bindValue(6, $editarPonto->getLatitude());
            $stmt->bindValue(7, $editarPonto->getLongitude());

            $stmt->bindValue(8, $editarPonto->getCod_ponto());
            $stmt->bindValue(9, $editarPonto->getCod_ibge());
            $stmt->bindValue(10, $editarPonto->getCod_categoria());
            $stmt->bindValue(11, $editarPonto->getCod_pid());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarPonto(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ponto, cod_categoria, cod_ibge, cod_pid, endereco, numero, complemento, bairro, cep, latitude, longitude
            FROM ponto
            ORDER BY cod_ponto ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


    public function visualizarPonto(ClassPonto $visualizarPonto){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT ponto.*, categoria.descricao,municipio.nome_municipio, pid.nome 
            FROM ponto 
            INNER JOIN categoria ON ponto.cod_categoria = categoria.cod_categoria
            INNER JOIN municipio ON ponto.cod_ibge = municipio.cod_ibge
            INNER JOIN pid ON ponto.cod_pid = pid.cod_pid
            WHERE ponto.cod_ponto =?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarPonto->getCod_ponto());
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


    // apagar registro pelo id
    public function apagarPonto(ClassPonto $apagarPonto) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM ponto WHERE cod_ponto = ? AND cod_categoria = ? AND cod_ibge = ? AND cod_pid = ?" ;
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarPonto->getCod_ponto());
            $stmt->bindValue(2, $apagarPonto->getCod_categoria());
            $stmt->bindValue(3, $apagarPonto->getCod_ibge());
            $stmt->bindValue(4, $apagarPonto->getCod_pid());
            
            $resultado = $stmt->execute();
            var_dump($apagarPonto);
            //die();
            return $resultado;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
