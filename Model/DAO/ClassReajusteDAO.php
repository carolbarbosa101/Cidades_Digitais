<?php

require_once 'Conexao.php';
class ClassReajusteDAO {
    
    public function cadastrar(ClassReajuste $cadastrarReajuste) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO reajuste (ano_ref, cod_lote, percentual) values (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarReajuste->getAno_ref());
            $stmt->bindValue(2, $cadastrarReajuste->getCod_lote());
            $stmt->bindValue(3, $cadastrarReajuste->getPercentual());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function update(ClassReajuste $editarReajuste) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE reajuste SET  percentual = ? WHERE ano_ref = ? AND cod_lote = ? ";
            $stmt = $pdo->prepare($sql);    
            $stmt->bindValue(1, $editarReajuste->getPercentual());

            $stmt->bindValue(2, $editarReajuste->getAno_ref());
            $stmt->bindValue(3, $editarReajuste->getCod_lote());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function contador($ano_referencia){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT Count(ano_ref) as contador
            FROM reajuste 
            WHERE ano_ref < $ano_referencia";

            $stmt = $pdo->prepare($sql);
            //AND cod_lote = ? 
           // $stmt->bindValue(2, $visualizarReajuste->getCod_lote());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarPercentual($ano_referencia, $cod_lote){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT percentual 
            FROM reajuste 
            WHERE ano_ref < $ano_referencia AND cod_lote = $cod_lote";

            $stmt = $pdo->prepare($sql);
            //AND cod_lote = ? 
           // $stmt->bindValue(2, $visualizarReajuste->getCod_lote());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


    public function listarReajuste(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT ano_ref, cod_lote, percentual
            FROM reajuste
            ORDER BY ano_ref ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarReajuste(ClassReajuste $visualizarReajuste){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT ano_ref, cod_lote, percentual 
            FROM reajuste 
            WHERE ano_ref = ?  AND cod_lote = ? ";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarReajuste->getAno_ref());
            $stmt->bindValue(2, $visualizarReajuste->getCod_lote());
            //AND cod_lote = ? 
           // $stmt->bindValue(2, $visualizarReajuste->getCod_lote());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarReajuste(ClassReajuste $apagarReajuste) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM reajuste WHERE ano_ref = ? AND cod_lote = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarReajuste->getAno_ref());
            $stmt->bindValue(2, $apagarReajuste->getCod_lote());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
