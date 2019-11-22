<?php
require_once 'Conexao.php';
class ClassTipologiaDAO {

    public function cadastrar(ClassTipologia $cadastrarTipologia) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO tipologia (cod_tipologia, descricao) values (?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarTipologia->getCod_tipologia());
			$stmt->bindValue(2, $cadastrarTipologia->getDescricao());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function update(ClassTipologia $editarTipologia) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE tipologia
            SET descricao = ? WHERE cod_tipologia = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarTipologia->getDescricao());

            $stmt->bindValue(2, $editarTipologia->getCod_tipologia());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarTipologia(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_tipologia, descricao
            FROM tipologia
            ORDER BY cod_tipologia ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function visualizarTipologia(ClassTipologia $visualizarTipologia){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_tipologia, descricao
            FROM tipologia
            WHERE cod_tipologia = ? ";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarTipologia->getCod_tipologia());
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function apagarTipologia(ClassTipologia $apagarTipologia) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM tipologia WHERE cod_tipologia = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarTipologia->getCod_tipologia());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
