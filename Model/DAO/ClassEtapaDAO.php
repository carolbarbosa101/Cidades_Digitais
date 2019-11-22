<?php
/**
 * Description of ClassEtapa
 * @author Carol
 */
require_once 'Conexao.php';
class ClassEtapaDAO {

    public function cadastrar(ClassEtapa $cadastrarEtapa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO etapa (cod_etapa, descricao, duracao, depende, delay, setor_resp) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            
			$stmt->bindValue(1, $cadastrarEtapa->getCod_etapa());
			$stmt->bindValue(2, $cadastrarEtapa->getDescricao());
            $stmt->bindValue(3, $cadastrarEtapa->getDuracao());
            $stmt->bindValue(4, $cadastrarEtapa->getDepende());
            $stmt->bindValue(5, $cadastrarEtapa->getDelay());
			$stmt->bindValue(6, $cadastrarEtapa->getSetor_resp());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function update(ClassEtapa $editarEtapa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE etapa SET descricao = ?, duracao = ?, depende = ?, delay = ?, setor_resp = ?
             WHERE cod_etapa = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $editarEtapa->getDescricao());
            $stmt->bindValue(2, $editarEtapa->getDuracao());
            $stmt->bindValue(3, $editarEtapa->getDepende());
            $stmt->bindValue(4, $editarEtapa->getDelay());
            $stmt->bindValue(5, $editarEtapa->getSetor_resp());

            $stmt->bindValue(6, $editarEtapa->getCod_etapa());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarEtapa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_etapa, descricao, duracao, depende, delay, setor_resp FROM etapa ORDER BY cod_etapa ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarEtapa(ClassEtapa $apagarEtapa) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM etapa WHERE cod_etapa = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $apagarEtapa->getCod_etapa());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


      /**
     * Buscar todos os Etapa para exibir em tabelas que precisa
     * do codigo etapa, ou seja tabela de relacionamento com etapa
     */
    public function todosEtapa(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT cod_etapa, setor_resp
            FROM etapa
            ORDER BY setor_resp ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados. 
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function visualizarEtapa(ClassEtapa $visualizarEtapa){
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT cod_etapa, descricao, duracao, depende, delay, setor_resp 
            FROM etapa 
            WHERE cod_etapa = ? 
            LIMIT 1";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $visualizarEtapa->getCod_etapa());

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }


}
