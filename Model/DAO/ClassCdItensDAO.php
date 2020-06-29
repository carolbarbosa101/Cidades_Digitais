<?php

require_once 'Conexao.php';
class ClassCdItensDAO {


    
    public function cadastrar(ClassCdItens $cadastrarCdItens) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO cd_itens (cod_ibge,cod_item,cod_tipo_item,quantidade_previsto,quantidade_projeto_executivo,quantidade_termo_instalacao) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarCdItens->getCod_ibge());
            $stmt->bindValue(2, $cadastrarCdItens->getCod_item ());
            $stmt->bindValue(3, $cadastrarCdItens->getCod_tipo_item());
            $stmt->bindValue(4, $cadastrarCdItens->getQuantidade_previsto());
            $stmt->bindValue(5, $cadastrarCdItens->getQuantidade_projeto_executivo());
            $stmt->bindValue(6, $cadastrarCdItens->getQuantidade_termo_instalacao());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function update(ClassCdItens $editarCdItens) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE cd_itens SET quantidade_previsto = ?, quantidade_projeto_executivo = ?,
            quantidade_termo_instalacao = ? WHERE cod_ibge = ? AND cod_item = ? AND cod_tipo_item = ? ";
            $stmt = $pdo->prepare($sql);
          
            $stmt->bindValue(1, $editarCdItens->getQuantidade_previsto());
            $stmt->bindValue(2, $editarCdItens->getQuantidade_projeto_executivo());
            $stmt->bindValue(3, $editarCdItens->getQuantidade_termo_instalacao());

            $stmt->bindValue(4, $editarCdItens->getCod_ibge());
            $stmt->bindValue(5, $editarCdItens->getCod_item());
            $stmt->bindValue(6, $editarCdItens->getCod_tipo_item());
           
            

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarCdItensPag($inicio, $maximo){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            municipio.nome_municipio, 
            CONCAT (itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS descricao, 
            cd_itens.*
            FROM cd_itens 
            INNER JOIN municipio ON cd_itens.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON cd_itens.cod_item = itens.cod_item AND cd_itens.cod_tipo_item = itens.cod_tipo_item
            ORDER BY municipio.nome_municipio, itens.cod_tipo_item, itens.cod_item ASC LIMIT $inicio,$maximo";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarCdItens(){
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

    public function visualizarCdItens(ClassCdItens $visualizarCdItens){
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