<?php

require_once 'Conexao.php';
class ClassUacomAssuntoDAO {
        
    public function cadastrar(ClassUacomAssunto $cadastrarUacomAssunto) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO uacom_assunto (cod_ibge, data, cod_assunto) values (?,?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarUacomAssunto->getCod_ibge());
			$stmt->bindValue(2, $cadastrarUacomAssunto->getData());
            $stmt->bindValue(3, $cadastrarUacomAssunto->getCod_assunto());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }



    public function listarUacomAssunto(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ibge, data, cod_assunto
            FROM uacom_assunto
            ORDER BY cod_ibge ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarUacom(ClassUacom $apagarUacom) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM uacom WHERE cod_ibge = ? AND data = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $apagarUacom->getCod_ibge());
            $stmt->bindValue(2, $apagarUacom->getData());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function update(ClassUacom $editarUacom) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE uacom SET titulo = ?, relato = ?
            WHERE cod_ibge = ? AND data = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarUacom->getTitulo());
            $stmt->bindValue(2, $editarUacom->getRelato());

            $stmt->bindValue(3, $editarUacom->getCod_ibge());
            $stmt->bindValue(4, $editarUacom->getData());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosCd(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ibge, nome_municipio FROM municipio ORDER BY nome_municipio ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarUacom(ClassUacom $visualizarUacom){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_ibge, data, titulo, relato 
            FROM uacom 
            WHERE cod_ibge = ? AND data = ?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarUacom->getCod_ibge());
            $stmt->bindValue(2, $visualizarUacom->getData());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
