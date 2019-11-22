<?php
session_start();
require_once '../Model/ClassCdItens.php';
require_once '../Model/DAO/ClassCdItensDAO.php';


$cod_ibge = @$_POST['cod_ibge'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$quantidade_previsto = @$_POST['quantidade_previsto'];
$quantidade_projeto_executivo = @$_POST['quantidade_projeto_executivo'];
$quantidade_termo_instalacao = @$_POST['quantidade_termo_instalacao'];


$novoCdItens = new ClassCdItens();
$novoCdItens->setCod_ibge($cod_ibge);
$novoCdItens->setCod_item($cod_item);
$novoCdItens->setCod_tipo_item($cod_tipo_item);
$novoCdItens->setQuantidade_previsto($quantidade_previsto);
$novoCdItens->setQuantidade_projeto_executivo($quantidade_projeto_executivo);
$novoCdItens->setQuantidade_termo_instalacao($quantidade_termo_instalacao);



$classCdItensDAO = new ClassCdItensDAO();
$cditens = $classCdItensDAO->update($novoCdItens);

//var_dump($cditens);
//die();

if($cditens == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/CdItens.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$cditens.'
        </div>
    ';
    header('Location:../View/CdItens.php');
}

