<?php
require_once 'Conexao.php';
class ClassOtbDAO {
  
    public function cadastrar(ClassOtb $cadastrarOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO otb (cod_otb, dt_pgto) values (?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarOtb->getCod_otb());
			$stmt->bindValue(2, $cadastrarOtb->getDt_pgto());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function update(ClassOtb $editarOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE otb SET dt_pgto = ?
            WHERE cod_otb = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $$editarOtb->getDt_pgto());

            $stmt->bindValue(2, $$editarOtb->getcod_otb());
    
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarOtb(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_otb, dt_pgto FROM otb ORDER BY cod_otb ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function apagarOtb(ClassOtb $apagarOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM otb WHERE cod_otb = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarOtb->getCod_assunto());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function visualizarOtb(ClassOtb $visualizarOtb){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_otb, dt_pgto
            FROM otb  
            WHERE cod_otb = ?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarOtb->getCod_otb());
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function todosOtb(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_otb, dt_pgto FROM otb ORDER BY cod_otb ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
