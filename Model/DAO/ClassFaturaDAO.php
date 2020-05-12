<?php
require_once 'Conexao.php';
//$num_nf = @$_GET['num_nf'];
//$cod_ibge = @$_GET['cod_ibge'];
class ClassFaturaDAO {
    
    public function cadastrar(ClassFatura $cadastrarFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO fatura (num_nf, cod_ibge, dt_nf) values (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarFatura->getNum_nf());
            $stmt->bindValue(2, $cadastrarFatura->getCod_ibge());
            $stmt->bindValue(3, $cadastrarFatura->getDt_nf());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassFatura $editarFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE fatura SET dt_nf = ?
            WHERE num_nf = ? AND  cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            


            $stmt->bindValue(1, $editarFatura->getDt_nf());

            $stmt->bindValue(2, $editarFatura->getNum_nf());
            $stmt->bindValue(3, $editarFatura->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarFatura(){
        
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT num_nf, cod_ibge, dt_nf FROM fatura ORDER BY num_nf ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarFatura(ClassFatura $visualizarFatura){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT num_nf, cod_ibge, dt_nf 
            FROM fatura 
            WHERE num_nf = ? AND cod_ibge = ?";

            

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarFatura->getNum_nf());
            $stmt->bindValue(2, $visualizarFatura->getCod_ibge());

            //var_dump($visualizarFatura);
            //    die;

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarFatura(ClassFatura $apagarFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM fatura WHERE num_nf = ? AND cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarFatura->getNum_nf());
            $stmt->bindValue(2, $apagarFatura->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    
    public function todosIBGE(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT distinct cod_ibge from fatura;

            SELECT num_nf from fatura
            where cod_ibge = cod_ibge";
            $stmt = $pdo->prepare($sql);


            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function todosFatura(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CONCAT (municipio.nome_municipio ,' - ', fatura.cod_ibge) AS itens, fatura.num_nf, fatura.cod_ibge, fatura.dt_nf
            FROM fatura
            INNER JOIN municipio ON fatura.cod_ibge = municipio.cod_ibge
            ORDER BY num_nf ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
