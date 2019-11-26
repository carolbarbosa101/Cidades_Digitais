<?php
require_once 'Conexao.php';
class ClassTipologiaPidDAO {

    public function cadastrar(ClassTipologiaPid $cadastrarTipologiaPid) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO pid_tipologia (cod_pid, cod_tipologia) values (?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarTipologiaPid->getCod_pid());
			$stmt->bindValue(2, $cadastrarTipologiaPid->getCod_tipologia());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarTipologiaPid(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT
            pid.nome,
            tipologia.descricao,
            pid_tipologia.cod_pid,
            pid_tipologia.cod_tipologia
            FROM pid_tipologia
            INNER JOIN pid ON pid_tipologia.cod_pid = pid.cod_pid
            INNER JOIN tipologia ON pid_tipologia.cod_tipologia = tipologia.cod_tipologia
            ORDER BY tipologia.descricao ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function apagarTipologiaPid(ClassTipologiaPid $apagarTipologiaPid) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM pid_tipologia WHERE cod_pid = ? AND cod_tipologia = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarTipologiaPid->getCod_pid());
            $stmt->bindValue(2, $apagarTipologiaPid->getCod_tipologia());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
