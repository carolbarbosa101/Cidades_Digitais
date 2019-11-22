<?php

require_once '../Model/ClassCd.php';
require_once '../Model/DAO/ClassCdDAO.php';

$cod_ibge = @$_GET['cod_ibge'];


$visualizarCd = new ClassCd();
$visualizarCd->setCod_ibge($cod_ibge);



$ver = new ClassCdDAO();
$dados = $ver->visualizarCd($visualizarCd);

if($dados) { 
    $array_dados = $dados[0];

} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>';
        header('Location:../View/Cd.php');
}