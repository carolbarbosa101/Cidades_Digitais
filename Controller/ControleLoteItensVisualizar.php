<?php

require_once '../Model/ClassLoteItens.php';
require_once '../Model/DAO/ClassLoteItensDAO.php';

$cod_lote = @$_GET['cod_lote'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

$visualizarLoteItens = new ClassLoteItens();
$visualizarLoteItens->setCod_lote($cod_lote);
$visualizarLoteItens->setCod_item($cod_item);
$visualizarLoteItens->setCod_tipo_item($cod_tipo_item);

$ver = new ClassLoteItensDAO();
$dados = $ver->visualizarLoteItens($visualizarLoteItens);

if($dados) { 
    $array_dados = $dados[0];
    
   
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/LoteItens.php');
}