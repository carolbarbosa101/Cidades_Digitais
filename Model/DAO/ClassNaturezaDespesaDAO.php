<?php

require_once 'Conexao.php';
class ClassNaturezaDespesaDAO {
    
    public function cadastrar(ClassNaturezaDespesa $cadastrarNaturezaDespesa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO natureza_despesa (cod_natureza_despesa, descricao) values (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarNaturezaDespesa->getCod_natureza_despesa());
            $stmt->bindValue(2, $cadastrarNaturezaDespesa->getDescricao());

           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassNaturezaDespesa $editarNaturezaDespesa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE natureza_despesa
            SET  descricao = ?
            WHERE cod_natureza_despesa = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarNaturezaDespesa->getDescricao());


            $stmt->bindValue(2, $editarNaturezaDespesa->getCod_natureza_despesa());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarNaturezaDespesa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_natureza_despesa, descricao
             FROM natureza_despesa ORDER BY cod_natureza_despesa ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarNaturezaDespesa(ClassNaturezaDespesa $visualizarNaturezaDespesa){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_natureza_despesa, descricao 
            FROM natureza_despesa 
            WHERE cod_natureza_despesa = ? 
            LIMIT 1";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarNaturezaDespesa->getCod_natureza_despesa());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function todosNaturezaDespesa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_natureza_despesa, descricao
            FROM natureza_despesa
            ORDER BY cod_natureza_despesa ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarNaturezaDespesa(ClassNaturezaDespesa $apagarNaturezaDespesa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM natureza_despesa WHERE cod_natureza_despesa = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarNaturezaDespesa->getCod_natureza_despesa());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
