<?php

require_once 'Conexao.php';
class ClassItensEmpenhoDAO {


    
    public function cadastrar(ClassItensEmpenho $cadastrarItensEmpenho) {
        //var_dump($cadastrarItensEmpenho);
        //die;


        //Não cadastra diretamente, é cadastrado por meio de uma trigger
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO itens_empenho (cod_empenho,cod_item,cod_tipo_item,cod_previsao_empenho,valor,quantidade) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarItensEmpenho->getCod_empenho());
            $stmt->bindValue(2, $cadastrarItensEmpenho->getCod_item ());
            $stmt->bindValue(3, $cadastrarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(4, $cadastrarItensEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(5, $cadastrarItensEmpenho->getValor());
            $stmt->bindValue(6, $cadastrarItensEmpenho->getQuantidade());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarItensEmpenho(ClassItensEmpenho $apagarItensEmpenho) {
        try {
            //var_dump($apagarItensEmpenho);
            //die;

            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM itens_empenho 
            WHERE cod_empenho = ? AND cod_item = ? AND cod_tipo_item = ? AND cod_previsao_empenho = ?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $apagarItensEmpenho->getCod_empenho());
            $stmt->bindValue(2, $apagarItensEmpenho->getCod_item());
            $stmt->bindValue(3, $apagarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(4, $apagarItensEmpenho->getCod_previsao_empenho());

            
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassItensEmpenho $editarItensEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_empenho SET valor = ?, quantidade = ? 
            WHERE cod_empenho = ? AND cod_item = ? AND cod_tipo_item = ? AND cod_previsao_empenho = ?";
            $stmt = $pdo->prepare($sql);
          
            $stmt->bindValue(1, $editarItensEmpenho->getValor());
            $stmt->bindValue(2, $editarItensEmpenho->getQuantidade());

            $stmt->bindValue(3, $editarItensEmpenho->getCod_empenho());
            $stmt->bindValue(4, $editarItensEmpenho->getCod_item());
            $stmt->bindValue(5, $editarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(6, $editarItensEmpenho->getCod_previsao_empenho());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    
    //Não sei como deveria ser a listagem da função listar e visualizar
    public function listarItensEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(empenho.cod_empenho, ' - ', empenho.data) AS empenhoLista, 
            CONCAT(itens.cod_item, ' - ', itens.descricao, ' - ', itens.unidade) AS itemLista,
            CONCAT(tipo_item.cod_tipo_item, ' - ', tipo_item.descricao) AS tipo_itemLista,
            CONCAT(previsao_empenho.cod_previsao_empenho, ' - ', previsao_empenho.data) AS previsaoLista,
            empenho.cod_empenho, itens.cod_item, tipo_item.cod_tipo_item, previsao_empenho.cod_previsao_empenho, itens_empenho.valor, itens_empenho.quantidade
            FROM itens_empenho
            INNER JOIN empenho ON itens_empenho.cod_empenho = empenho.cod_empenho
            INNER JOIN itens ON itens_empenho.cod_item = itens.cod_item
            INNER JOIN tipo_item ON itens_empenho.cod_tipo_item = tipo_item.cod_tipo_item
            INNER JOIN previsao_empenho ON itens_empenho.cod_previsao_empenho = previsao_empenho.cod_previsao_empenho
            ORDER BY itens_empenho.cod_empenho ASC";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    /**SELECT valor, quantidade,
            CONCAT(empenho.cod_empenho, ' - ', empenho.data) AS empenhoLista
            FROM itens_empenho
            INNER JOIN empenho ON itens_empenho.cod_empenho = empenho.cod_empenho
            ORDER BY itens_empenho.cod_empenho ASC;
            
            SELECT CONCAT(itens.cod_item, ' - ', itens.descricao, ' - ', itens.unidade) AS itemLista
            FROM itens_empenho
            INNER JOIN itens ON itens_empenho.cod_item = itens.cod_item
            ORDER BY itens_empenho.cod_empenho ASC;
            
            SELECT CONCAT(tipo_item.cod_tipo_item, ' - ', tipo_item.descricao) AS tipo_itemLista
            FROM itens_empenho
            INNER JOIN tipo_item ON itens_empenho.cod_tipo_item = tipo_item.cod_tipo_item
            ORDER BY itens_empenho.cod_empenho ASC;
            
            SELECT CONCAT(previsao_empenho.cod_previsao_empenho, ' - ', previsao_empenho.data) AS previsaoLista
            FROM itens_empenho
            INNER JOIN previsao_empenho ON itens_empenho.cod_previsao_empenho = previsao_empenho.cod_previsao_empenho
            ORDER BY itens_empenho.cod_empenho ASC */

    public function visualizarItensEmpenho(ClassItensEmpenho $visualizarItensEmpenho){
        //var_dump($visualizarItensEmpenho);
        //die;
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT *
            FROM itens_empenho 
            WHERE cod_empenho = ? AND cod_item = ? AND cod_tipo_item = ? AND cod_previsao_empenho = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarItensEmpenho->getCod_empenho());
            $stmt->bindValue(2, $visualizarItensEmpenho->getCod_item());
            $stmt->bindValue(3, $visualizarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(3, $visualizarItensEmpenho->getCod_previsao_empenho());

            $stmt->execute();
            $resultado = $stmt->fetchAll();
            //var_dump($resultado);
            //die;
            return $resultado;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


}