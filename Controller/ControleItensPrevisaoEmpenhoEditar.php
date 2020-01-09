<?php
session_start();
require_once '../Model/ClassItensPrevisaoEmpenho.php';
require_once '../Model/DAO/ClassItensPrevisaoEmpenhoDAO.php';


$cod_previsao_empenho = @$_POST['cod_previsao_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$cod_lote = @$_POST['cod_lote'];
$valor = @$_POST['valor'];
$quantidade = @$_POST['quantidade'];

$novoItensPrevisaoEmpenho = new ClassItensPrevisaoEmpenho ();
$novoItensPrevisaoEmpenho->setCod_previsao_empenho($cod_previsao_empenho);
$novoItensPrevisaoEmpenho->setCod_item($cod_item);
$novoItensPrevisaoEmpenho->setCod_tipo_item($cod_tipo_item);
$novoItensPrevisaoEmpenho->setCod_lote($cod_lote);
$novoItensPrevisaoEmpenho->setValor($valor);
$novoItensPrevisaoEmpenho->setQuantidade($quantidade);

//var_dump($novoItensPrevisaoEmpenho);
//die();

$classItensPrevisaoEmpenhoDAO = new ClassItensPrevisaoEmpenhoDAO();
$itens_fatura = $classItensPrevisaoEmpenhoDAO->update($novoItensPrevisaoEmpenho);


//var_dump($itens_fatura);
//die();

if($itens_fatura == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/ItensPrevisaoEmpenho.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$itens_fatura.'
        </div>
    ';
    header('Location:../View/ItensPrevisaoEmpenho.php');
}
