<?php
require_once 'Conexao.php';
class ClassEmpenhoDAO {
    
    public function cadastrar(ClassEmpenho $cadastrarEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO empenho (cod_empenho, cod_previsao_empenho, data, contador) values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarEmpenho->getCod_empenho());
            $stmt->bindValue(2, $cadastrarEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(3, $cadastrarEmpenho->getData());
            $stmt->bindValue(4, $cadastrarEmpenho->getContador());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassEmpenho $editarEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE empenho SET cod_previsao_empenho = ?, data = ? , contador = ? WHERE cod_empenho = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(2, $editarEmpenho->getData());
            $stmt->bindValue(3, $editarEmpenho->getContador());
            $stmt->bindValue(3, $editarEmpenho->getCod_empenho());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            

            $sql = "SELECT		empenho.cod_empenho, CONCAT(previsao_empenho.cod_previsao_empenho, ' - ', natureza_despesa.descricao, ' - ', previsao_empenho.data) as previsao, empenho.data
            FROM empenho 
            INNER JOIN previsao_empenho ON empenho.cod_previsao_empenho = previsao_empenho.cod_previsao_empenho
            INNER JOIN natureza_despesa ON previsao_empenho.cod_natureza_despesa = natureza_despesa.cod_natureza_despesa
            ORDER BY empenho.cod_empenho ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarEmpenho(ClassEmpenho $visualizarEmpenho){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT CONCAT(previsao_empenho.cod_previsao_empenho,  ' - ' , previsao_empenho.cod_lote, ' - ' , previsao_empenho.cod_natureza_despesa) AS previsao,
            previsao_empenho.cod_previsao_empenho
            FROM previsao_empenho 
            ORDER BY previsao_empenho.cod_previsao_empenho ASC";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarEmpenho->getCod_empenho());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarEmpenho(ClassEmpenho $apagarEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM empenho WHERE cod_empenho = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarEmpenho->getCod_empenho());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(empenho.cod_empenho,  ' - ' , empenho.data) AS empenho,
            empenho.cod_empenho,empenho.data
            FROM empenho 
            ORDER BY empenho ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    /**SELECT CONCAT(empenho.cod_empenho,  ' - ' , empenho.data,  ' - ' , previsao_empenho.data) AS empenho,
            empenho.cod_empenho,empenho.data
            FROM empenho 
            INNER JOIN previsao_empenho ON empenho.cod_previsao_empenho = previsao_empenho.cod_previsao_empenho
            ORDER BY empenho ASC
            */
}
