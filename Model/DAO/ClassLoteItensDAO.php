<?php
require_once 'Conexao.php';
class ClassLoteItensDAO {
    public function cadastrar(ClassLoteItens $cadastrarLoteItens) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO lote_itens (cod_lote, cod_item, cod_tipo_item, preco) values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarLoteItens->getCod_Lote());
            $stmt->bindValue(2, $cadastrarLoteItens->getCod_item());            
            $stmt->bindValue(3, $cadastrarLoteItens->getCod_tipo_item());            
			$stmt->bindValue(4, $cadastrarLoteItens->getPreco());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function update(ClassLoteItens $editarLoteItens) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE lote_itens SET preco = ?
            WHERE cod_lote = ?  AND cod_item = ? AND cod_tipo_item = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarLoteItens->getPreco());

            $stmt->bindValue(2, $editarLoteItens->getCod_lote());
            $stmt->bindValue(3, $editarLoteItens->getCod_item());
            $stmt->bindValue(4, $editarLoteItens->getCod_tipo_item());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarLoteItens(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_lote,cod_item,cod_tipo_item, preco FROM lote_itens ORDER BY cod_lote ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarLoteItens(ClassLoteItens $apagarLoteItens) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM lote_itens WHERE cod_lote = ? AND cod_item = ? AND cod_tipo_item = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarLoteItens->getCod_lote());
            $stmt->bindValue(2, $apagarLoteItens->getCod_item());
            $stmt->bindValue(3, $apagarLoteItens->getCod_tipo_item());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function visualizarLoteItens(ClassLoteItens $visualizarLoteItens){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_lote, cod_item, cod_lote_item,preco
            FROM lote_itens  
            WHERE cod_lote = ? AND cod_item = ? AND cod_tipo_item = ?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarLoteItens->getCod_lote());
            $stmt->bindValue(2, $visualizarLoteItens->getCod_item());
            $stmt->bindValue(3, $visualizarLoteItens->getCod_tipo_item());
            
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
