<?php
require_once 'Conexao.php';
class ClassCategoriaDAO {
    public function cadastrar(ClassCategoria $cadastrarCategoria) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO categoria (cod_categoria, descricao) values (?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarCategoria->getCod_categoria());
			$stmt->bindValue(2, $cadastrarCategoria->getDescricao());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function update(ClassCategoria $editarCategoria) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE categoria
            SET descricao = ?
            WHERE cod_categoria = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarCategoria->getDescricao());

            $stmt->bindValue(2, $editarCategoria->getCod_categoria());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarCategoria(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_categoria, descricao FROM categoria ORDER BY cod_categoria ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function apagarCategoria(ClassCategoria $apagarCategoria) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM categoria WHERE cod_categoria = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarCategoria->getCod_categoria());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosCategoria(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_categoria, descricao FROM categoria ORDER BY cod_categoria ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarCategoria(ClassCategoria $visualizarCategoria){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_categoria, descricao
            FROM categoria  
            WHERE cod_categoria = ?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarCategoria->getCod_categoria());
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
