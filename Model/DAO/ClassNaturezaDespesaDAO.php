<?php

require_once 'Conexao.php';
class ClassNaturezaDespesaDAO {
    
    public function cadastrar(ClassNaturezaDespesa $cadastrarNaturezaDespesa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO natureza_despesa (cod_natureza_despesa, descricao) values (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarNaturezaDespesa->getCod_natureza_despesa());
            $stmt->bindValue(2, $cadastrarNaturezaDespesa->getDescricao());

           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassNaturezaDespesa $editarNaturezaDespesa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE natureza_despesa
            SET  descricao = ?
            WHERE cod_natureza_despesa = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarNaturezaDespesa->getNome_municipio());
            $stmt->bindValue(2, $editarNaturezaDespesa->getPopulacao());


            $stmt->bindValue(14, $editarNaturezaDespesa->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarNaturezaDespesa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ibge, nome_municipio, populacao, uf, regiao, cnpj, dist_capital, endereco, numero, complemento, bairro, idhm, latitude, longitude FROM municipio ORDER BY nome_municipio ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarNaturezaDespesa(ClassNaturezaDespesa $visualizarNaturezaDespesa){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_ibge, nome_municipio, populacao, uf, regiao, cnpj, dist_capital, endereco, numero, complemento, bairro, idhm, latitude, longitude 
            FROM municipio 
            WHERE cod_ibge = ? 
            LIMIT 1";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarNaturezaDespesa->getCod_ibge());

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
    public function todosNaturezaDespesa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_ibge, nome_municipio FROM municipio ORDER BY nome_municipio ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarNaturezaDespesa(ClassNaturezaDespesa $apagarNaturezaDespesa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM municipio WHERE cod_ibge = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarNaturezaDespesa->getCod_ibge());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
