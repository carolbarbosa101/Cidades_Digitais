<?php
/** Description of ClassLoteDAO
 * @author Carol */

require_once 'Conexao.php';
class ClassLoteDAO {

    public function cadastrar(ClassLote $cadastrarLote) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO lote (cod_lote, cnpj, contrato, dt_inicio_vig, dt_final_vig, dt_reajuste) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarLote->getCod_Lote());
            $stmt->bindValue(2, $cadastrarLote->getCnpj());
            $stmt->bindValue(3, $cadastrarLote->getContrato());
            $stmt->bindValue(4, $cadastrarLote->getDt_inicio_vig());
            $stmt->bindValue(5, $cadastrarLote->getDt_final_vig());
            $stmt->bindValue(6, $cadastrarLote->getDt_reajuste());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarLote(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT lote.cod_lote, entidade.nome, lote.cnpj, lote.contrato, lote.dt_inicio_vig, lote.dt_final_vig, lote.dt_reajuste
            FROM lote
            INNER JOIN entidade ON lote.cnpj = entidade.cnpj
            ORDER BY lote.cod_lote ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function visualizarLote(ClassLote $visualizarLote){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT lote.cod_lote, lote.cnpj, lote.contrato, lote.dt_inicio_vig, lote.dt_final_vig, lote.dt_reajuste, entidade.nome, entidade.cnpj
            FROM lote 
            INNER JOIN entidade ON lote.cnpj = entidade.cnpj
            WHERE lote.cod_lote = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $visualizarLote->getCod_lote());
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarLote(ClassLote $apagarLote) {
        // var_dump($apagarLote);
        //     die();
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM lote_itens WHERE cod_lote = ?;
            DELETE FROM lote WHERE cod_lote = ?;";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarLote->getCod_lote());
            $stmt->bindValue(2, $apagarLote->getCod_lote());

           
            $resultados = $stmt->execute();
            
            return TRUE;

        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function todosLote(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_lote FROM lote ORDER BY cod_lote ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function update(ClassLote $editarLote) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE lote SET cnpj = ?, contrato = ?, dt_inicio_vig = ?, dt_final_vig = ?, dt_reajuste = ?
            WHERE cod_lote = ?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $editarLote->getCnpj());
            $stmt->bindValue(2, $editarLote->getContrato());
            $stmt->bindValue(3, $editarLote->getDt_inicio_vig());
            $stmt->bindValue(4, $editarLote->getDt_final_vig());
            $stmt->bindValue(5, $editarLote->getDt_reajuste());

            $stmt->bindValue(6, $editarLote->getCod_lote());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


}
