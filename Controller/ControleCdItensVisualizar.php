<?php

require_once '../Model/ClassCdItens.php';
require_once '../Model/DAO/ClassCdItensDAO.php';

$cod_ibge = @$_GET['cod_ibge'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

$visualizarCdItens = new ClassCdItens();

$visualizarCdItens->setCod_ibge($cod_ibge);
$visualizarCdItens->setCod_item($cod_item);
$visualizarCdItens->setCod_tipo_item($cod_tipo_item);

$ver = new ClassCdItensDAO(); 
$dados = $ver->visualizarCdItens($visualizarCdItens); 

//var_dump($dados);
//die;

if($dados) { 
    $array_dados = $dados[0];
    
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar Itens de Cidades Digitais.
        </div>
    ';
    header('Location:../View/CdItens.php');
}