<?php
require_once 'Conexao.php';
class ClassEntidadeDAO {
    
    public function cadastrar(ClassEntidade $cadastrarEntidade) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO entidade (cnpj, nome, endereco, numero, bairro, cep, nome_municipio, uf, observacao) values (?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarEntidade->getCnpj());
            $stmt->bindValue(2, $cadastrarEntidade->getNome());
            $stmt->bindValue(3, $cadastrarEntidade->getEndereco());
            $stmt->bindValue(4, $cadastrarEntidade->getNumero());
            $stmt->bindValue(5, $cadastrarEntidade->getBairro());
            $stmt->bindValue(6, $cadastrarEntidade->getCep());
            $stmt->bindValue(7, $cadastrarEntidade->getNome_municipio());
            $stmt->bindValue(8, $cadastrarEntidade->getUf());
            $stmt->bindValue(9, $cadastrarEntidade->getObservacao());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassEntidade $editarEntidade) {
        
    //var_dump($editarEntidade);
    //die();
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE entidade SET nome = ?, endereco = ?, numero = ?, bairro = ?, cep = ?, nome_municipio = ?, uf =? , observacao = ? WHERE cnpj = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarEntidade->getNome());
            $stmt->bindValue(2, $editarEntidade->getEndereco());
            $stmt->bindValue(3, $editarEntidade->getNumero());
            $stmt->bindValue(4, $editarEntidade->getBairro());
            $stmt->bindValue(5, $editarEntidade->getCep());
            $stmt->bindValue(6, $editarEntidade->getNome_municipio());
            $stmt->bindValue(7, $editarEntidade->getUf());
            $stmt->bindValue(8, $editarEntidade->getObservacao());

            $stmt->bindValue(9, $editarEntidade->getCnpj());
            

            //var_dump($editarEntidade);
            //die();
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarEntidade(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cnpj, nome, endereco, numero, bairro, cep, nome_municipio, uf, observacao FROM entidade ORDER BY cnpj ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarEntidade(ClassEntidade $visualizarEntidade){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cnpj, nome, endereco, numero, bairro, cep, nome_municipio, uf, observacao 
            FROM entidade 
            WHERE cnpj = ? 
            LIMIT 1";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarEntidade->getCnpj());

            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarEntidade(ClassEntidade $apagarEntidade) {
        //var_dump($apagarEntidade);
            //die;
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM entidade WHERE cnpj = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarEntidade->getCnpj());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosEntidade(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cnpj, nome FROM entidade ORDER BY nome ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
