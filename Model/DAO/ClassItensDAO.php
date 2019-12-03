<?php

require_once 'Conexao.php';
class ClassItensDAO {

    public function todosItens(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(itens.cod_item, ' - ', itens.descricao, ' - ', itens.unidade) AS item, 
            itens.cod_item
            FROM itens 
			ORDER BY itens.cod_item ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


}
