<?php
require_once 'Conexao.php';

class ClassItensOtbDAO {
    
    public function cadastrar(ClassItensOtb $cadastrarItensOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO itens_otb (cod_otb, num_nf, cod_ibge, cod_empenho,cod_item, cod_tipo_item,valor,quantidade ) values (?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarItensOtb->getCod_otb());
            $stmt->bindValue(2, $cadastrarItensOtb->getNum_nf());
            $stmt->bindValue(3, $cadastrarItensOtb->getCod_ibge());
            $stmt->bindValue(4, $cadastrarItensOtb->getCod_empenho());
            $stmt->bindValue(5, $cadastrarItensOtb->getCod_item());
            $stmt->bindValue(6, $cadastrarItensOtb->getCod_tipo_item());
            $stmt->bindValue(7, $cadastrarItensOtb->getValor());
            $stmt->bindValue(8, $cadastrarItensOtb->getQuantidade());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassItensOtb $editarItensOtb) {
        //var_dump($editarItensOtb);
        //die();

        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_otb SET valor = ?, quantidade = ?
            WHERE cod_otb = ? AND num_nf = ? AND  cod_ibge = ? AND cod_empenho = ? AND cod_item = ?  AND cod_tipo_item = ? ";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $editarItensOtb->getValor());
            $stmt->bindValue(2, $editarItensOtb->getQuantidade());


            $stmt->bindValue(3, $editarItensOtb->getCod_otb());
            $stmt->bindValue(4, $editarItensOtb->getNum_nf());
            $stmt->bindValue(5, $editarItensOtb->getCod_ibge());
            $stmt->bindValue(6, $editarItensOtb->getCod_empenho());
            $stmt->bindValue(7, $editarItensOtb->getCod_item());
            $stmt->bindValue(8, $editarItensOtb->getCod_tipo_item());
            
            //var_dump($editarItensOtb);
            //die();
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarItensOtb(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
			CONCAT (municipio.nome_municipio, ' - ', municipio.cod_ibge) AS municipioIbge, 
            CONCAT (itens_otb.cod_tipo_item, '.', itens_otb.cod_item, ' - ', itens.descricao) AS descricaoItem, 
            itens_otb.*
            FROM itens_otb 
            INNER JOIN municipio ON itens_otb.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON itens_otb.cod_item = itens.cod_item AND itens_otb.cod_tipo_item = itens.cod_tipo_item
            ORDER BY num_nf ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function visualizarItensOtb(ClassItensOtb $visualizarItensOtb){
        //var_dump($visualizarItensOtb);
        //die;
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT 
			CONCAT (municipio.nome_municipio, ' - ', municipio.cod_ibge) AS municipioIbge, 
            CONCAT (itens_otb.cod_tipo_item, '.', itens_otb.cod_item, ' - ', itens.descricao) AS descricaoItens, 
            itens_otb.*
            FROM itens_otb 
            INNER JOIN municipio ON itens_otb.cod_ibge = municipio.cod_ibge
            INNER JOIN itens ON itens_otb.cod_item = itens.cod_item AND itens_otb.cod_tipo_item = itens.cod_tipo_item
            WHERE itens_otb.cod_otb = ? AND itens_otb.num_nf = ? AND itens_otb.cod_ibge = ? AND itens_otb.cod_empenho = ? AND itens_otb.cod_item = ? AND itens_otb.cod_tipo_item = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarItensOtb->getCod_otb());
            $stmt->bindValue(2, $visualizarItensOtb->getNum_nf());
            $stmt->bindValue(3, $visualizarItensOtb->getCod_ibge());
            $stmt->bindValue(4, $visualizarItensOtb->getCod_empenho());
            $stmt->bindValue(5, $visualizarItensOtb->getCod_item());
            $stmt->bindValue(6, $visualizarItensOtb->getCod_tipo_item());

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
    public function apagarItensOtb(ClassItensOtb $apagarItensOtb) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM itens_otb WHERE cod_otb = ? AND num_nf = ? AND cod_ibge = ? AND cod_empenho = ? AND cod_item = ? AND cod_tipo_item =?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $apagarItensOtb->getCod_otb());
            $stmt->bindValue(2, $apagarItensOtb->getNum_nf());
            $stmt->bindValue(3, $apagarItensOtb->getCod_ibge());
            $stmt->bindValue(4, $apagarItensOtb->getCod_empenho());
            $stmt->bindValue(5, $apagarItensOtb->getCod_item());
            $stmt->bindValue(6, $apagarItensOtb->getCod_tipo_item());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosItensOtb(){
        //var_dump($todosItensOtb);
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
