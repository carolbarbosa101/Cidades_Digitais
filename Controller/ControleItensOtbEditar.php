<?php
session_start();
require_once '../Model/ClassItensOtb.php';
require_once '../Model/DAO/ClassItensOtbDAO.php';

$cod_otb = @$_POST['cod_otb'];
$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];
$cod_empenho = @$_POST['cod_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$valor = @$_POST['valor'];
$quantidade = @$_POST['quantidade'];


$novoItensOtb = new ClassItensOtb ();
$novoItensOtb->setCod_otb($cod_otb);
$novoItensOtb->setNum_nf($num_nf);
$novoItensOtb->setCod_ibge($cod_ibge);
$novoItensOtb->setCod_empenho($cod_empenho);
$novoItensOtb->setCod_item($cod_item);
$novoItensOtb->setCod_tipo_item($cod_tipo_item);
$novoItensOtb->setValor($valor);
$novoItensOtb->setQuantidade($quantidade);

//var_dump($novoItensOtb);
//die();

$classItensOtbDAO = new ClassItensOtbDAO();
$itens_otb = $classItensOtbDAO->update($novoItensOtb);


//var_dump($itens_otb);
//die();

if($itens_otb == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/ItensOtb.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$itens_otb.'
        </div>
    ';
    header('Location:../View/ItensOtb.php');
}