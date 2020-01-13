<?php

require_once 'Conexao.php';
class ClassItensDAO {

    public function todosItens(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS item, 
            itens.cod_item, itens.cod_tipo_item
            FROM itens 
			ORDER BY itens.cod_tipo_item, itens.cod_item ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarItens(ClassItens $visualizarItens){
        //var_dump($visualizarItens);
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            municipio.nome_municipio, 
            CONCAT (itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS descricao, 
            cd_itens.*
            FROM cd_itens 
            INNER JOIN municipio ON cd_itens.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON cd_itens.cod_item = itens.cod_item AND cd_itens.cod_tipo_item = itens.cod_tipo_item
            WHERE cd_itens.cod_item = ? AND cd_itens.cod_tipo_item = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarItens->getCod_item());
            $stmt->bindValue(2, $visualizarItens->getCod_tipo_item());

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
