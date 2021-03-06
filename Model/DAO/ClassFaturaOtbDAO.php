<?php
/**
 * Description of ClassAssunto
 * @author Carol
 */
require_once 'Conexao.php';
class ClassFaturaOtbDAO {
 
    public function cadastrar(ClassFaturaOtb $cadastrarFaturaOtb) {
        
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO fatura_otb (cod_otb, num_nf, cod_ibge) values (?,?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarFaturaOtb->getCod_otb());
            $stmt->bindValue(2, $cadastrarFaturaOtb->getNum_nf());
            $stmt->bindValue(3, $cadastrarFaturaOtb->getCod_ibge());

            //var_dump($cadastrarFaturaOtb);
            //die();

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function apagarFaturaOtb(ClassFaturaOtb $apagarFaturaOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM fatura_otb WHERE cod_otb = ? AND num_nf = ? AND cod_ibge = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $apagarFaturaOtb->getCod_otb());
            $stmt->bindValue(2, $apagarFaturaOtb->getNum_nf());
            $stmt->bindValue(3, $apagarFaturaOtb->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassFaturaOtb $editarFaturaOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE fatura_otb SET  num_nf = ?, 
            WHERE cod_assunto = ? AND num_nf = ? AND cod_ibge = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarAssunto->getDescricao());

            $stmt->bindValue(2, $editarAssunto->getCod_assunto());
    
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarFaturaOtb(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_otb, num_nf, cod_ibge FROM fatura_otb ORDER BY cod_otb ASC";
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
            $sql = "SELECT itens_fatura.num_nf, fatura.cod_ibge
            FROM itens_fatura
            INNER JOIN fatura ON itens_fatura.cod_ibge = fatura.cod_ibge 
			ORDER BY itens_fatura.num_nf ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
