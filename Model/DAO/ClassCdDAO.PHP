<?php
require_once 'Conexao.php';
class ClassCdDAO {

    public function cadastrar(ClassCd $cadastrarCd) {
        try {
            //var_dump($cadastrarCd);
            //die;
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO cd (cod_ibge,cod_lote,os_pe,data_pe,os_imp,data_imp) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarCd->getCod_ibge());
			$stmt->bindValue(2, $cadastrarCd->getCod_lote());
            $stmt->bindValue(3, $cadastrarCd->getOs_pe());
            $stmt->bindValue(4, $cadastrarCd->getData_pe());
            $stmt->bindValue(5, $cadastrarCd->getOs_imp());
			$stmt->bindValue(6, $cadastrarCd->getdata_imp());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function update(ClassCd $editarCd) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE cd
            SET  cod_lote = ?, os_pe = ?, data_pe = ?, os_imp = ?, data_imp = ?
            WHERE cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarCd->getCod_lote());
            $stmt->bindValue(2, $editarCd->getOs_pe());
            $stmt->bindValue(3, $editarCd->getData_pe());
            $stmt->bindValue(4, $editarCd->getOs_imp());
            $stmt->bindValue(5, $editarCd->getData_imp());

            $stmt->bindValue(6, $editarCd->getCod_ibge());
            
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    
    public function listarCd(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT(municipio.nome_municipio,  ' - ' , municipio.uf,': ',cd.cod_ibge) AS ibge,
            cd.cod_lote, cd.os_pe,cd.data_pe,cd.os_imp, cd.data_imp,cd.cod_ibge,  municipio.cod_ibge
            
            FROM cd 
            INNER JOIN municipio ON cd.cod_ibge = municipio.cod_ibge
            ORDER BY ibge ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarCd(ClassCd $apagarCd) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM cd WHERE cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarCd->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function visualizarCd(ClassCd $visualizarCd){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT CONCAT(municipio.nome_municipio,  ' - ' , municipio.uf,': ',cd.cod_ibge) AS ibge,
            cd.*, municipio.cod_ibge
            FROM cd 
            INNER JOIN municipio ON cd.cod_ibge = municipio.cod_ibge
            WHERE cd.cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $visualizarCd->getCod_ibge());
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function todosCd(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cd.cod_ibge, municipio.nome_municipio FROM cd 
            INNER JOIN municipio ON cd.cod_ibge = municipio.cod_ibge
            ORDER BY nome_municipio ASC;";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}