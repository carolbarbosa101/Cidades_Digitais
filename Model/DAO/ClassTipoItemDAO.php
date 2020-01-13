<?php

require_once 'Conexao.php';
class ClassTipoItemDAO {

    public function todosTipoItem(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(tipo_item.cod_tipo_item, ' - ', tipo_item.descricao) AS tipo, 
            tipo_item.cod_tipo_item
            FROM tipo_item
            ORDER BY  tipo_item.cod_tipo_item ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
        /**SELECT CONCAT(tipo_item.cod_tipo_item, ' - ', tipo_item.descricao) AS tipo, 
            tipo_item.cod_tipo_item
            FROM tipo_item 
			ORDER BY  tipo_item.cod_tipo_item ASC */

}
