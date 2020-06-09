<?php

require_once 'Conexao.php';
class ClassItensPrevisaoEmpenhoDAO {



    public function update(ClassItensPrevisaoEmpenho $editarItensPrevisaoEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_previsao_empenho SET valor = ?, quantidade = ? 
            WHERE cod_previsao_empenho = ? AND cod_item = ? AND cod_tipo_item = ?";
            $stmt = $pdo->prepare($sql);
          
            $stmt->bindValue(1, $editarItensPrevisaoEmpenho->getValor());
            $stmt->bindValue(2, $editarItensPrevisaoEmpenho->getQuantidade());

            $stmt->bindValue(3, $editarItensPrevisaoEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(4, $editarItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(5, $editarItensPrevisaoEmpenho->getCod_tipo_item());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function updateNew($preco, $cod_previsao_empenho, $cod_item, $cod_tipo_item) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_previsao_empenho SET valor = $preco 
            WHERE cod_previsao_empenho = $cod_previsao_empenho AND cod_item = $cod_item AND cod_tipo_item = $cod_tipo_item";
            

            //var_dump($sql);
            //die;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarNumero($cod_previsao_empenho){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT COUNT(itens_previsao_empenho.cod_previsao_empenho) AS numero
            FROM itens_previsao_empenho
            INNER JOIN lote_itens ON itens_previsao_empenho.cod_lote = lote_itens.cod_lote AND itens_previsao_empenho.cod_item = lote_itens.cod_item AND itens_previsao_empenho.cod_tipo_item = lote_itens.cod_tipo_item
            WHERE itens_previsao_empenho.cod_previsao_empenho = $cod_previsao_empenho";

            $stmt = $pdo->prepare($sql);
            //AND cod_lote = ? 
            // $stmt->bindValue(2, $visualizarReajuste->getCod_lote());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    
    // public function listarNumero(){
    //     try {
    //         $pdo = Conexao::getInstance();
    //         $sql = "SELECT 	COUNT(cod_previsao_empenho) AS numeros
    //         FROM itens_previsao_empenho";

    //         $stmt = $pdo->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     } catch (PDOException $ex) {
    //         return $ex->getMessage();
    //     }
    // }

    public function listarItensPrevisaoEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 	CONCAT(itens_previsao_empenho.cod_tipo_item, '.', itens_previsao_empenho.cod_item, ' - ', itens.descricao) AS itemLista,
            itens_previsao_empenho.cod_lote, itens_previsao_empenho.cod_previsao_empenho, itens_previsao_empenho.cod_item, itens_previsao_empenho.cod_tipo_item, itens_previsao_empenho.valor, itens_previsao_empenho.quantidade
            FROM itens_previsao_empenho
            INNER JOIN itens ON itens_previsao_empenho.cod_item = itens.cod_item AND itens_previsao_empenho.cod_tipo_item = itens.cod_tipo_item
            ORDER BY itens_previsao_empenho.cod_previsao_empenho, itens_previsao_empenho.cod_tipo_item, itens_previsao_empenho.cod_item ASC";

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

    public function visualizarItensPrevisaoEmpenho(ClassItensPrevisaoEmpenho $visualizarItensPrevisaoEmpenho){
        //var_dump($visualizarItensPrevisaoEmpenho);
        //die;
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            (
            SELECT SUM(cd_itens.quantidade_termo_instalacao) AS quant_cidade
            FROM itens_previsao_empenho
            INNER JOIN lote ON itens_previsao_empenho.cod_lote = lote.cod_lote
            INNER JOIN cd ON lote.cod_lote = cd.cod_lote
            INNER JOIN cd_itens ON cd.cod_ibge = cd_itens.cod_ibge AND itens_previsao_empenho.cod_tipo_item = cd_itens.cod_tipo_item AND itens_previsao_empenho.cod_item = cd_itens.cod_item
            where cd_itens.cod_tipo_item = ? AND cd_itens.cod_item = ? AND itens_previsao_empenho.cod_previsao_empenho = ?
            )
            -
            (
            SELECT  SUM(itens_previsao_empenho.quantidade) AS quant_itens_prev
            FROM itens_previsao_empenho
            where itens_previsao_empenho.cod_lote = ? AND itens_previsao_empenho.cod_tipo_item = ? AND itens_previsao_empenho.cod_item = ?
            ) AS quant_calc,
            CONCAT (itens_previsao_empenho.cod_tipo_item, '.', itens_previsao_empenho.cod_item, ' - ', itens.descricao) AS itensLista, 
            itens_previsao_empenho.*, lote.cod_lote
            FROM itens_previsao_empenho 
            INNER JOIN itens ON itens_previsao_empenho.cod_item = itens.cod_item AND itens_previsao_empenho.cod_tipo_item = itens.cod_tipo_item
            INNER JOIN lote ON itens_previsao_empenho.cod_lote = lote.cod_lote
            WHERE itens_previsao_empenho.cod_previsao_empenho = ? AND itens_previsao_empenho.cod_tipo_item = ? AND itens_previsao_empenho.cod_item = ?  AND itens_previsao_empenho.cod_lote = ?
        ;";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $visualizarItensPrevisaoEmpenho->getCod_tipo_item());
            $stmt->bindValue(2, $visualizarItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(3, $visualizarItensPrevisaoEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(4, $visualizarItensPrevisaoEmpenho->getCod_lote());
            $stmt->bindValue(5, $visualizarItensPrevisaoEmpenho->getCod_tipo_item());
            $stmt->bindValue(6, $visualizarItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(7, $visualizarItensPrevisaoEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(8, $visualizarItensPrevisaoEmpenho->getCod_tipo_item());
            $stmt->bindValue(9, $visualizarItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(10, $visualizarItensPrevisaoEmpenho->getCod_lote());

            $stmt->execute();
            $resultado = $stmt->fetchAll();
            //var_dump($resultado);
            //die;
            return $resultado;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function selectItensPrevisaoEmpenho(ClassItensPrevisaoEmpenho $selectItensPrevisaoEmpenho){
        //var_dump($selectItensPrevisaoEmpenho);
        //die;
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            (
            SELECT SUM(cd_itens.quantidade_termo_instalacao) AS quant_cidade
            FROM itens_previsao_empenho
            INNER JOIN lote ON itens_previsao_empenho.cod_lote = lote.cod_lote
            INNER JOIN cd ON lote.cod_lote = cd.cod_lote
            INNER JOIN cd_itens ON cd.cod_ibge = cd_itens.cod_ibge AND itens_previsao_empenho.cod_tipo_item = cd_itens.cod_tipo_item AND itens_previsao_empenho.cod_item = cd_itens.cod_item
            where cd_itens.cod_tipo_item = ? AND cd_itens.cod_item = ? AND itens_previsao_empenho.cod_previsao_empenho = ?
            )
            -
            (
            SELECT  SUM(itens_previsao_empenho.quantidade) AS quant_itens_prev
            FROM itens_previsao_empenho
            where itens_previsao_empenho.cod_lote = ? AND itens_previsao_empenho.cod_tipo_item = ? AND itens_previsao_empenho.cod_item = ?
            ) AS quant_calc,
            CONCAT (itens_previsao_empenho.cod_tipo_item, '.', itens_previsao_empenho.cod_item, ' - ', itens.descricao) AS itensLista, 
            itens_previsao_empenho.*, lote.cod_lote
            FROM itens_previsao_empenho 
            INNER JOIN itens ON itens_previsao_empenho.cod_item = itens.cod_item AND itens_previsao_empenho.cod_tipo_item = itens.cod_tipo_item
            INNER JOIN lote ON itens_previsao_empenho.cod_lote = lote.cod_lote
            WHERE itens_previsao_empenho.cod_previsao_empenho = ? AND itens_previsao_empenho.cod_tipo_item = ? AND itens_previsao_empenho.cod_item = ?  AND itens_previsao_empenho.cod_lote = ?
        ;";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $selectItensPrevisaoEmpenho->getCod_tipo_item());
            $stmt->bindValue(2, $selectItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(3, $selectItensPrevisaoEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(4, $selectItensPrevisaoEmpenho->getCod_lote());
            $stmt->bindValue(5, $selectItensPrevisaoEmpenho->getCod_tipo_item());
            $stmt->bindValue(6, $selectItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(7, $selectItensPrevisaoEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(8, $selectItensPrevisaoEmpenho->getCod_tipo_item());
            $stmt->bindValue(9, $selectItensPrevisaoEmpenho->getCod_item());
            $stmt->bindValue(10, $selectItensPrevisaoEmpenho->getCod_lote());

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