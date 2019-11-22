<?php

require_once 'Conexao.php';
class ClassPidDAO {
        
    public function cadastrar(ClassPid $cadastrarPid) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO pid (cod_pid, cod_ibge, nome, inep) values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
			$stmt->bindValue(1, $cadastrarPid->getCod_pid());
			$stmt->bindValue(2, $cadastrarPid->getCod_ibge());
            $stmt->bindValue(3, $cadastrarPid->getNome());
            $stmt->bindValue(4, $cadastrarPid->getInep());
            $stmt->execute();
            $responseId = $pdo->lastInsertId();
            //var_dump($responseId);

            $sql = "SELECT cod_pid, cod_ibge, nome, inep FROM pid WHERE cod_pid = ? LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $responseId);
            $stmt->execute();
            $dados = $stmt->fetchAll();
            //var_dump($dados);
            return $dados;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarPid(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(municipio.nome_municipio,  ' - ' , municipio.uf,': ',pid.cod_ibge) AS codigo_ibge,
            pid.nome,
            categoria.descricao,
            ponto.endereco,
            pid.cod_pid,
            ponto.cod_ponto,
            pid.inep,
            ponto.cod_categoria,
            ponto.cod_ibge
            FROM pid
            INNER JOIN municipio ON pid.cod_ibge = municipio.cod_ibge
            INNER JOIN ponto ON pid.cod_pid = ponto.cod_pid
            INNER JOIN categoria ON ponto.cod_categoria = categoria.cod_categoria
            ORDER BY cod_ibge, ponto.cod_categoria ,ponto.cod_ponto ASC";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


    public function update(ClassPid $editarPid) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE pid SET  nome = ?, inep = ?
            WHERE cod_pid = ? ";
            $stmt = $pdo->prepare($sql);
           
            $stmt->bindValue(1, $editarPid->getNome());
            $stmt->bindValue(2, $editarPid->getInep());

            $stmt->bindValue(3, $editarPid->getCod_pid());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }



    public function visualizarPid(ClassPid $visualizarPid){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT ponto.*, pid.*, categoria.*, municipio.nome_municipio

            FROM pid
            
            INNER JOIN municipio ON pid.cod_ibge = municipio.cod_ibge
            INNER JOIN ponto ON pid.cod_pid = ponto.cod_pid
            INNER JOIN categoria ON ponto.cod_categoria = categoria.cod_categoria
            WHERE pid.cod_pid = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $visualizarPid->getCod_pid());
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    

    public function apagarPid(ClassPid $apagarPid) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM pid WHERE cod_pid = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarPid->getCod_pid());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    

    public function todosPid(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_pid, cod_ibge, nome FROM pid ORDER BY cod_pid ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
