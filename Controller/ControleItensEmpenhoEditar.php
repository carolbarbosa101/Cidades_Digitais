<?php
session_start();
require_once '../Model/ClassItensEmpenho.php';
require_once '../Model/DAO/ClassItensEmpenhoDAO.php';


$cod_empenho = @$_POST['cod_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$cod_previsao_empenho = @$_POST['cod_previsao_empenho'];
$valor = @$_POST['valor'];
$quantidade = @$_POST['quantidade'];


$novoItensEmpenho = new ClassItensEmpenho ();
$novoItensEmpenho->setCod_empenho($cod_empenho);
$novoItensEmpenho->setCod_item($cod_item);
$novoItensEmpenho->setCod_tipo_item($cod_tipo_item);
$novoItensEmpenho->setCod_previsao_empenho($cod_previsao_empenho);
$novoItensEmpenho->setValor($valor);
$novoItensEmpenho->setQuantidade($quantidade);

$classItensEmpenhoDAO = new ClassItensEmpenhoDAO();
$itens_empenho = $classItensEmpenhoDAO->update($novoItensEmpenho);


//var_dump($itens_empenho);
//die();

if($itens_empenho == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/ItensEmpenho.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$itens_empenho.'
        </div>
    ';
    header('Location:../View/ItensEmpenho.php');
}
