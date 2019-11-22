<?php

require_once 'Conexao.php';
class ClassModuloDAO {
    
    public function cadastrar(ClassModulo $cadastrarModulo) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO modulo (cod_modulo,categoria_1, categoria_2, categoria_3, descricao) values (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarModulo->getCod_modulo());
            $stmt->bindValue(2, $cadastrarModulo->getCategoria_1());
            $stmt->bindValue(3, $cadastrarModulo->getCategoria_2());
            $stmt->bindValue(4, $cadastrarModulo->getCategoria_3());
            $stmt->bindValue(5, $cadastrarModulo->getDescricao());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarmodulo(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_modulo,categoria_1, categoria_2, categoria_3, descricao FROM modulo ORDER BY cod_modulo ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Buscar todos os municipios para exibir em tabelas que precisa
     * do codigo ibge, ou seja tabela de relacionamento com municipio
     */
    public function todosMunicipios(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_modulo,categoria_1, categoria_2, categoria_3, descricao FROM modulo ORDER BY cod_modulo ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarModulo(ClassModulo $apagarModulo) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM modulo WHERE cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarModulo->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
