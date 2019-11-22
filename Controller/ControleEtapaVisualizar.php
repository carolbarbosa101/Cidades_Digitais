<?php

require_once '../Model/ClassEtapa.php';
require_once '../Model/DAO/ClassEtapaDAO.php';

$cod_etapa = @$_GET['cod_etapa'];

$visualizarEtapa = new ClassEtapa();
$visualizarEtapa->setCod_etapa($cod_etapa);

$ver = new ClassEtapaDAO();
$dados = $ver->visualizarEtapa($visualizarEtapa); 

if($dados) { 
    $array_dados = $dados[0];
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/Etapa.php');
}