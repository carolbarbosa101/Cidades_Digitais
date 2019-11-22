<?php

require_once 'Conexao.php';
class ClassProcessoDAO {

    public function cadastrar(ClassProcesso $cadastrarProcesso) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO processo (cod_processo, cod_ibge, descricao) values (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarProcesso->getCod_processo());
            $stmt->bindValue(2, $cadastrarProcesso->getCod_ibge());
            $stmt->bindValue(3, $cadastrarProcesso->getDescricao());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassProcesso $editarProcesso) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE processo SET  descricao = ? WHERE cod_processo = ? AND cod_ibge = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $editarProcesso->getDescricao());

            $stmt->bindValue(2, $editarProcesso->getCod_processo());
            $stmt->bindValue(3, $editarProcesso->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarProcesso(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(municipio.nome_municipio,  ' - ' , municipio.uf,': ',processo.cod_ibge) AS cod_ibge_dados, municipio.cod_ibge, cod_processo, descricao
            FROM processo
            INNER JOIN municipio ON processo.cod_ibge = municipio.cod_ibge
            ORDER BY cod_processo ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarProcesso(ClassProcesso $apagarProcesso) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM processo WHERE cod_processo = ? AND cod_ibge = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarProcesso->getCod_processo());
            $stmt->bindValue(2, $apagarProcesso->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function visualizarProcesso(ClassProcesso $visualizarProcesso){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_processo, cod_ibge, descricao 
            FROM processo 
            WHERE cod_processo = ? AND cod_ibge = ? 
            LIMIT 1";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarProcesso->getCod_processo());
            $stmt->bindValue(2, $visualizarProcesso->getCod_ibge());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }



}
