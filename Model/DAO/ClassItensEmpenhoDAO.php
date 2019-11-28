<?php

require_once 'Conexao.php';
class ClassItensEmpenhoDAO {


    
    public function cadastrar(ClassItensEmpenho $cadastrarItensEmpenho) {
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


    public function update(ClassCdItens $editarCdItens) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_empenho SET valor = ?, quantidade = ? 
            WHERE cod_empenho = ? AND cod_item = ? AND cod_tipo_item = ? AND cod_previsao_empenho = ?";
            $stmt = $pdo->prepare($sql);
          
            $stmt->bindValue(1, $editarCdItens->getValor());
            $stmt->bindValue(2, $editarCdItens->getQuantidade());

            $stmt->bindValue(3, $editarCdItens->getCod_empenho());
            $stmt->bindValue(4, $editarCdItens->getCod_item());
            $stmt->bindValue(5, $editarCdItens->getCod_tipo_item());
            $stmt->bindValue(6, $editarCdItens->getCod_previsao_empenho());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    ???????????????????????????????????????????????????????????????????????????????????????
    //Não sei como deveria ser a listagem da função listar e visualizar
    public function listarItensEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            municipio.nome_municipio, 
            CONCAT (itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS descricao, 
            cd_itens.*
            FROM cd_itens 
            INNER JOIN municipio ON cd_itens.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON cd_itens.cod_item = itens.cod_item AND cd_itens.cod_tipo_item = itens.cod_tipo_item
            ORDER BY municipio.nome_municipio, itens.cod_tipo_item, itens.cod_item ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarItensEmpenho(ClassItensEmpenho $visualizarItensEmpenho){
        //var_dump($visualizarCdItens);
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            municipio.nome_municipio, 
            CONCAT (itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS descricao, 
            cd_itens.*
            FROM cd_itens 
            INNER JOIN municipio ON cd_itens.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON cd_itens.cod_item = itens.cod_item AND cd_itens.cod_tipo_item = itens.cod_tipo_item
            WHERE municipio.cod_ibge = ? AND cd_itens.cod_item = ? AND cd_itens.cod_tipo_item = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarCdItens->getCod_ibge());
            $stmt->bindValue(2, $visualizarCdItens->getCod_item());
            $stmt->bindValue(3, $visualizarCdItens->getCod_tipo_item());

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