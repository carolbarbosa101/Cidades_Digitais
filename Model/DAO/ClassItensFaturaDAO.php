<?php
require_once 'Conexao.php';

class ClassItensFaturaDAO {
    
    public function cadastrar(ClassItensFatura $cadastrarItensFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO itens_fatura (num_nf, cod_ibge, id_empenho,cod_item, cod_tipo_item,valor,quantidade ) values (?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarItensFatura->getNum_nf());
            $stmt->bindValue(2, $cadastrarItensFatura->getCod_ibge());
            $stmt->bindValue(3, $cadastrarItensFatura->getId_empenho());
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
        //var_dump($editarItensFatura);
        //die();

        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_fatura SET valor = ?, quantidade = ?
            WHERE num_nf = ? AND  cod_ibge = ? AND id_empenho = ? AND cod_item = ?  AND cod_tipo_item = ? ";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $editarItensFatura->getValor());
            $stmt->bindValue(2, $editarItensFatura->getQuantidade());


            $stmt->bindValue(3, $editarItensFatura->getNum_nf());
            $stmt->bindValue(4, $editarItensFatura->getCod_ibge());
            $stmt->bindValue(5, $editarItensFatura->getId_empenho());
            $stmt->bindValue(6, $editarItensFatura->getCod_item());
            $stmt->bindValue(7, $editarItensFatura->getCod_tipo_item());
            
            //var_dump($editarItensFatura);
            //die();
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarItensFatura(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
			CONCAT (municipio.nome_municipio, ' - ', municipio.cod_ibge) AS municipioIbge, 
            CONCAT (itens_fatura.cod_tipo_item, '.', itens_fatura.cod_item, ' - ', itens.descricao) AS descricaoItem, 
            itens_fatura.*, empenho.cod_empenho
            FROM itens_fatura 
            INNER JOIN municipio ON itens_fatura.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON itens_fatura.cod_item = itens.cod_item AND itens_fatura.cod_tipo_item = itens.cod_tipo_item
            INNER JOIN empenho ON itens_fatura.id_empenho = empenho.id_empenho
            ORDER BY num_nf ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarItensFatura(ClassItensFatura $visualizarItensFatura){
        //var_dump($visualizarItensFatura);
        //die;
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
            (
            SELECT itens_empenho.quantidade AS quant_empenho
            FROM itens_empenho
            where itens_empenho.id_empenho = ? AND itens_empenho.cod_tipo_item = ? AND itens_empenho.cod_item = ?
            )
            -
            (
            SELECT SUM(itens_fatura.quantidade) AS quant_fatura
            FROM itens_fatura
            where itens_fatura.id_empenho = ? AND itens_fatura.cod_tipo_item = ? AND itens_fatura.cod_item = ?
            ) AS quant_calc,
            CONCAT (municipio.nome_municipio, ' - ', municipio.cod_ibge) AS municipioIbge, 
            CONCAT (itens_fatura.cod_tipo_item, '.', itens_fatura.cod_item, ' - ', itens.descricao) AS descricaoItem, 
            itens_fatura.*, itens_empenho.valor as valor_empenho, empenho.cod_empenho
            FROM itens_fatura 
            INNER JOIN municipio ON itens_fatura.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON itens_fatura.cod_item = itens.cod_item AND itens_fatura.cod_tipo_item = itens.cod_tipo_item
            INNER JOIN itens_empenho ON itens_fatura.id_empenho = itens_empenho.id_empenho AND itens_fatura.cod_tipo_item = itens_empenho.cod_tipo_item AND itens_fatura.cod_item = itens_empenho.cod_item
            INNER JOIN empenho ON itens_fatura.id_empenho = empenho.id_empenho
            WHERE itens_fatura.num_nf = ? AND itens_fatura.cod_ibge = ? AND itens_fatura.id_empenho = ? AND itens_fatura.cod_tipo_item = ? AND itens_fatura.cod_item = ?
            ;";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarItensFatura->getId_empenho());
            $stmt->bindValue(2, $visualizarItensFatura->getCod_tipo_item());
            $stmt->bindValue(3, $visualizarItensFatura->getCod_item());
            $stmt->bindValue(4, $visualizarItensFatura->getId_empenho());
            $stmt->bindValue(5, $visualizarItensFatura->getCod_tipo_item());
            $stmt->bindValue(6, $visualizarItensFatura->getCod_item());
            $stmt->bindValue(7, $visualizarItensFatura->getNum_nf());
            $stmt->bindValue(8, $visualizarItensFatura->getCod_ibge());
            $stmt->bindValue(9, $visualizarItensFatura->getId_empenho());
            $stmt->bindValue(10, $visualizarItensFatura->getCod_tipo_item());
            $stmt->bindValue(11, $visualizarItensFatura->getCod_item());

            $stmt->execute();
            $resultado = $stmt->fetchAll();
            //var_dump($resultado);
            //die;
            return $resultado;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarItensFatura(ClassItensFatura $apagarItensFatura) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM itens_fatura WHERE num_nf = ? AND cod_ibge = ? AND id_empenho = ? AND cod_item = ? AND cod_tipo_item =?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $apagarItensFatura->getNum_nf());
            $stmt->bindValue(2, $apagarItensFatura->getCod_ibge());
            $stmt->bindValue(3, $apagarItensFatura->getId_empenho());
            $stmt->bindValue(4, $apagarItensFatura->getCod_item());
            $stmt->bindValue(5, $apagarItensFatura->getCod_tipo_item());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosItensFatura(){
        //var_dump($todosItensFatura);
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
			CONCAT (municipio.nome_municipio, ' - ', municipio.cod_ibge) AS municipioIbge, 
            CONCAT (itens_fatura.cod_tipo_item, '.', itens_fatura.cod_item, ' - ', itens.descricao) AS descricaoItem, 
            itens_fatura.*
            FROM itens_fatura 
            INNER JOIN municipio ON itens_fatura.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON itens_fatura.cod_item = itens.cod_item AND itens_fatura.cod_tipo_item = itens.cod_tipo_item
            ";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();
            $resultado = $stmt->fetchAll();
            //var_dump($resultado);
            //die;
            return $resultado;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


}
