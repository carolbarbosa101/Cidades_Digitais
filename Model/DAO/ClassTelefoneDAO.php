<?php
require_once 'Conexao.php';
class ClassTelefoneDAO {

    public function cadastrar(ClassTelefone $cadastrarTelefone) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO telefone (cod_telefone, cod_contato, telefone, tipo) values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            
           
            $stmt->bindValue(1, $cadastrarTelefone->getCod_telefone());
            $stmt->bindValue(2, $cadastrarTelefone->getCod_contato());
            $stmt->bindValue(3, $cadastrarTelefone->getTelefone());
			$stmt->bindValue(4, $cadastrarTelefone->getTipo());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassTelefone $editarTelefone) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE telefone SET telefone = ?, tipo = ? WHERE cod_telefone = ? AND cod_contato = ? ";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $editarTelefone->getTelefone());
            $stmt->bindValue(2, $editarTelefone->getTipo());

            $stmt->bindValue(3, $editarTelefone->getCod_telefone());
            $stmt->bindValue(4, $editarTelefone->getCod_contato());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function visualizarTelefone(ClassTelefone $visualizarTelefone){
        try {

            //var_dump($visualizarTelefone);
            //    die;

            $pdo = Conexao::getInstance();

            $sql = "SELECT telefone.cod_telefone, 
            CONCAT(contato.nome, ' - ', contato.cod_contato) AS contato,
            contato.nome, telefone.telefone, telefone.tipo , contato.cod_contato
            FROM telefone
            INNER JOIN contato ON telefone.cod_contato = contato.cod_contato
            WHERE telefone.cod_telefone = ? AND contato.cod_contato = ?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarTelefone->getCod_telefone());
            $stmt->bindValue(2, $visualizarTelefone->getCod_contato());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }



    public function listarTelefone(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT telefone.cod_telefone,
            CONCAT(contato.cod_contato, ' - ', contato.nome) AS contato,
            telefone.telefone, telefone.tipo, contato.cod_contato
            FROM telefone 
            INNER JOIN contato ON telefone.cod_contato = contato.cod_contato
            ORDER BY telefone.cod_telefone ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarTelefone(ClassTelefone $apagarTelefone) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM telefone WHERE cod_telefone = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarTelefone->getCod_telefone());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
