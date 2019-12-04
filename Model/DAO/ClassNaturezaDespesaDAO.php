<?php

require_once 'Conexao.php';
class ClassNaturezaDespesaDAO {
    
    /**
     * Buscar todos naturezas despesas para exibir em tabelas que precisa
     * do codigo cod_natureza_despesa, ou seja tabela de relacionamento com natureza_despesa
     * 
     * 
     * 
     * 
     * Esse código foi alterado pois o anterior apenas mostrava as opções que estivessem relacionadas com a tabela previsao_empenho. 
     * Caso precise do antigo código, ele está logo abaixo sem modificações, apenas comentado.
     * 
     * 
     * 
     * 
     * SELECT      previsao_empenho.cod_previsao_empenho,
            CONCAT(natureza_despesa.cod_natureza_despesa, ' - ', natureza_despesa.descricao) AS descricao
            FROM previsao_empenho 
            JOIN natureza_despesa ON previsao_empenho.cod_natureza_despesa = natureza_despesa.cod_natureza_despesa
			ORDER BY previsao_empenho.cod_previsao_empenho ASC
     */

    public function todosNaturezaDespesa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT natureza_despesa.cod_natureza_despesa, 
            CONCAT(natureza_despesa.cod_natureza_despesa, ' - ', natureza_despesa.descricao) AS descricao
            FROM natureza_despesa 
			ORDER BY natureza_despesa.cod_natureza_despesa ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
