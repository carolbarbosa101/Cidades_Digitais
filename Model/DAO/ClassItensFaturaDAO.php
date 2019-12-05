<?php
require_once 'Conexao.php';

class ClassItensFaturaDAO {
    
    public function cadastrar(ClassItensFatura $cadastrarItensFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO itens_fatura (num_nf, cod_ibge, cod_empenho,cod_item, cod_tipo_item,valor,quantidade ) values (?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarItensFatura->getNum_nf());
            $stmt->bindValue(2, $cadastrarItensFatura->getCod_ibge());
            $stmt->bindValue(3, $cadastrarItensFatura->getCod_empenho());
            $stmt->bindValue(4, $cadastrarItensFatura->getCod_item());
            $stmt->bindValue(5, $cadastrarItensFatura->getCod_tipo_item());
            $stmt->bindValue(6, $cadastrarItensFatura->getValor());
            $stmt->bindValue(7, $cadastrarItensFatura->getQuantidade());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassItensFatura $editarItensFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_fatura SET valor = ?, quantidade = ?
            WHERE num_nf = ? AND  cod_ibge = ? AND cod_empenho = ? AND cod_item = ?  AND cod_tipo_item =? ";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $editarItensFatura->getValor());
            $stmt->bindValue(2, $editarItensFatura->getQuantidade());


            $stmt->bindValue(3, $editarItensFatura->getNum_nf());
            $stmt->bindValue(4, $editarItensFatura->getCod_ibge());
            $stmt->bindValue(5, $editarItensFatura->getCod_empenho());
            $stmt->bindValue(6, $editarItensFatura->getCod_item());
            $stmt->bindValue(7, $editarItensFatura->getCod_tipo_item());
       
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarItensFatura(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT num_nf, cod_ibge, cod_empenho, cod_item, cod_tipo_item, valor, quantidade
            FROM itens_fatura
            ORDER BY num_nf ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarItensFatura(ClassItensFatura $visualizarItensFatura){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT num_nf, cod_ibge, cod_empenho, cod_item, cod_tipo_item, valor, quantidade
            FROM itens_fatura 
            WHERE num_nf = ? AND cod_ibge = ? AND cod_empenho = ? AND cod_item = ? AND cod_tipo_item =?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarItensFatura->getNum_nf());
            $stmt->bindValue(2, $visualizarItensFatura->getCod_ibge());
            $stmt->bindValue(3, $visualizarItensFatura->getCod_empenho());
            $stmt->bindValue(4, $visualizarItensFatura->getCod_item());
            $stmt->bindValue(5, $visualizarItensFatura->getCod_tipo_item());

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
            $sql = "DELETE FROM itens_fatura WHERE num_nf = ? AND cod_ibge = ? AND cod_empenho = ? AND cod_item = ? AND cod_tipo_item =?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $apagarFatura->getNum_nf());
            $stmt->bindValue(2, $apagarFatura->getCod_ibge());
            $stmt->bindValue(3, $apagarFatura->getCod_empenho());
            $stmt->bindValue(4, $apagarFatura->getCod_item());
            $stmt->bindValue(5, $apagarFatura->getCod_tipo_item());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }



}
