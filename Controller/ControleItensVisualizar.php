<?php

require_once '../Model/ClassItens.php';
require_once '../Model/DAO/ClassItensDAO.php';

$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

$visualizarItens = new ClassItens();

$visualizarItens->setCod_item($cod_item);
$visualizarItens->setCod_tipo_item($cod_tipo_item);

$ver = new ClassItensDAO(); 
$dados = $ver->visualizarItens($visualizarItens); 

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
    header('Location:../View/Itens.php');
}