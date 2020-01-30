<?php

require_once 'Conexao.php';
class ClassPrevisaoEmpenhoDAO {
    
    public function cadastrar(ClassPrevisaoEmpenho $cadastrarPrevisaoEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO previsao_empenho (cod_previsao_empenho, cod_lote, cod_natureza_despesa, data, tipo, ano_referencia) values (?,?, ?, ?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarPrevisaoEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(2, $cadastrarPrevisaoEmpenho->getCod_lote());
            $stmt->bindValue(3, $cadastrarPrevisaoEmpenho->getCod_natureza_despesa());
            $stmt->bindValue(4, $cadastrarPrevisaoEmpenho->getData());
            $stmt->bindValue(5, $cadastrarPrevisaoEmpenho->getTipo());
            $stmt->bindValue(6, $cadastrarPrevisaoEmpenho->getAno_referencia());
           
            //var_dump($cadastrarPrevisaoEmpenho->getTipo());
            //die();

            

            $stmt->execute();

            

            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    /*public function insertValor(ClassPrevisaoEmpenho $cadastrarPrevisaoEmpenho){
        if($cadastrarPrevisaoEmpenho->getTipo()=="O"){
            var_dump($cadastrarPrevisaoEmpenho);
            die();
        }
    }*/
    
    public function listarPrevisaoEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT      previsao_empenho.*,
            CONCAT(natureza_despesa.cod_natureza_despesa, ' - ', natureza_despesa.descricao) AS descricao
            FROM previsao_empenho 
            JOIN natureza_despesa ON previsao_empenho.cod_natureza_despesa = natureza_despesa.cod_natureza_despesa
			ORDER BY previsao_empenho.cod_previsao_empenho ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function todosPrevisaoEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT previsao_empenho.cod_previsao_empenho AS previsao, 
                        previsao_empenho.cod_previsao_empenho
                        FROM previsao_empenho 
                        ORDER BY previsao_empenho.cod_previsao_empenho ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


}
