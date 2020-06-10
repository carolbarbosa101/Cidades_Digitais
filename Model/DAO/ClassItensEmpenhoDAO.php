<?php

require_once 'Conexao.php';
class ClassItensEmpenhoDAO {


    
    public function cadastrar(ClassItensEmpenho $cadastrarItensEmpenho) {
        //var_dump($cadastrarItensEmpenho);
        //die;


        //Não cadastra diretamente, é cadastrado por meio de uma trigger
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO itens_empenho (cod_empenho,cod_item,cod_tipo_item,cod_previsao_empenho,valor,quantidade) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarItensEmpenho->getCod_empenho());
            $stmt->bindValue(2, $cadastrarItensEmpenho->getCod_item ());
            $stmt->bindValue(3, $cadastrarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(4, $cadastrarItensEmpenho->getCod_previsao_empenho());
            $stmt->bindValue(5, $cadastrarItensEmpenho->getValor());
            $stmt->bindValue(6, $cadastrarItensEmpenho->getQuantidade());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    // apagar registro pelo id
    public function apagarItensEmpenho(ClassItensEmpenho $apagarItensEmpenho) {
        try {
            //var_dump($apagarItensEmpenho);
            //die;

            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM itens_empenho 
            WHERE cod_empenho = ? AND cod_item = ? AND cod_tipo_item = ? AND cod_previsao_empenho = ?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $apagarItensEmpenho->getCod_empenho());
            $stmt->bindValue(2, $apagarItensEmpenho->getCod_item());
            $stmt->bindValue(3, $apagarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(4, $apagarItensEmpenho->getCod_previsao_empenho());

            
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function update(ClassItensEmpenho $editarItensEmpenho) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE itens_empenho SET valor = ?, quantidade = ? 
            WHERE id_empenho = ? AND cod_item = ? AND cod_tipo_item = ? AND cod_previsao_empenho = ?";
            $stmt = $pdo->prepare($sql);
          
            $stmt->bindValue(1, $editarItensEmpenho->getValor());
            $stmt->bindValue(2, $editarItensEmpenho->getQuantidade());

            $stmt->bindValue(3, $editarItensEmpenho->getCod_empenho());
            $stmt->bindValue(4, $editarItensEmpenho->getCod_item());
            $stmt->bindValue(5, $editarItensEmpenho->getCod_tipo_item());
            $stmt->bindValue(6, $editarItensEmpenho->getCod_previsao_empenho());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    
    public function listarItensEmpenhoPag($inicio, $maximo){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT empenho.cod_empenho AS empenhoLista, 
            CONCAT(itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS itemLista,
            itens_empenho.cod_previsao_empenho AS previsaoLista,
            itens_empenho.id_empenho, itens.cod_item, itens.cod_tipo_item, itens_empenho.cod_previsao_empenho, itens_empenho.valor, itens_empenho.quantidade
            FROM itens_empenho
            INNER JOIN itens ON itens_empenho.cod_item = itens.cod_item AND itens_empenho.cod_tipo_item = itens.cod_tipo_item 
            INNER JOIN empenho ON itens_empenho.id_empenho = empenho.id_empenho
            ORDER BY itens_empenho.id_empenho, itens_empenho.cod_tipo_item, itens_empenho.cod_item ASC LIMIT $inicio,$maximo";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarItensEmpenho(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT empenho.cod_empenho AS empenhoLista, 
            CONCAT(itens.cod_tipo_item, '.', itens.cod_item, ' - ', itens.descricao) AS itemLista,
            itens_empenho.cod_previsao_empenho AS previsaoLista,
            itens_empenho.id_empenho, itens.cod_item, itens.cod_tipo_item, itens_empenho.cod_previsao_empenho, itens_empenho.valor, itens_empenho.quantidade
            FROM itens_empenho
            INNER JOIN itens ON itens_empenho.cod_item = itens.cod_item AND itens_empenho.cod_tipo_item = itens.cod_tipo_item 
            INNER JOIN empenho ON itens_empenho.id_empenho = empenho.id_empenho
            ORDER BY itens_empenho.id_empenho, itens_empenho.cod_tipo_item, itens_empenho.cod_item ASC";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarItensEmpenhoFiltrarPesquisa($pesquisando,$inicio,$maximo){

        $pesquisaComLike = "%$pesquisando%";
        $condicaoPesquisar = " ( id_empenho LIKE :codigo OR item LIKE :assunto OR orevisao_empenho LIKE :assunto OR valor LIKE :assunto= :assuntoIgual) ";

        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id_empenho, cod_item, cod_tipo_item, cod_previsao_empenho, valor, quantidade FROM itens_empenho WHERE {$condicaoPesquisar} ORDER BY id_empenho ASC LIMIT $inicio,$maximo";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':codigo', $pesquisando);
            $stmt->bindParam(':assunto', $pesquisaComLike);
            $stmt->bindParam(':assuntoIgual', $pesquisando);
            $stmt->execute();
            return $stmt->fetchAll(); // fetchAll() retorna um array contendo varios dados.
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

            public function visualizarItensEmpenho(ClassItensEmpenho $visualizarItensEmpenho){
                //var_dump($visualizarItensEmpenho);
                //die;
                try {
                    $pdo = Conexao::getInstance();
                    $sql = "SELECT 
                    (
                    SELECT SUM(itens_previsao_empenho.quantidade) AS quant_itens_prev
                    FROM itens_previsao_empenho
                    where itens_previsao_empenho.cod_tipo_item = ? AND itens_previsao_empenho.cod_item = ? AND itens_previsao_empenho.cod_previsao_empenho = ?
                    )
                    -
                    (
                    SELECT SUM(itens_empenho.quantidade) AS quant_previsao
                    FROM itens_empenho
                    where itens_empenho.cod_tipo_item = ? AND itens_empenho.cod_item = ? AND itens_empenho.cod_previsao_empenho = ?
                    ) AS quant_calc,
                    CONCAT (itens_empenho.cod_tipo_item, '.', itens_empenho.cod_item, ' - ', itens.descricao) AS descricaoItem, 
                    itens_empenho.*, empenho.cod_empenho
                    FROM itens_empenho 
                    INNER JOIN itens ON itens_empenho.cod_item = itens.cod_item AND itens_empenho.cod_tipo_item = itens.cod_tipo_item
                    INNER JOIN empenho ON itens_empenho.id_empenho = empenho.id_empenho
                    WHERE itens_empenho.id_empenho = ? AND itens_empenho.cod_tipo_item = ? AND itens_empenho.cod_item = ? AND itens_empenho.cod_previsao_empenho = ?
                ;
                ";
                    $stmt = $pdo->prepare($sql);
                    
                    $stmt->bindValue(1, $visualizarItensEmpenho->getCod_tipo_item());
                    $stmt->bindValue(2, $visualizarItensEmpenho->getCod_item());
                    $stmt->bindValue(3, $visualizarItensEmpenho->getCod_previsao_empenho());
                    $stmt->bindValue(4, $visualizarItensEmpenho->getCod_tipo_item());
                    $stmt->bindValue(5, $visualizarItensEmpenho->getCod_item());
                    $stmt->bindValue(6, $visualizarItensEmpenho->getCod_previsao_empenho());
                    $stmt->bindValue(7, $visualizarItensEmpenho->getCod_empenho());
                    $stmt->bindValue(8, $visualizarItensEmpenho->getCod_tipo_item());
                    $stmt->bindValue(9, $visualizarItensEmpenho->getCod_item());
                    $stmt->bindValue(10, $visualizarItensEmpenho->getCod_previsao_empenho());
        
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