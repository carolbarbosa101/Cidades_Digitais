<?php

require_once '../Model/ClassEtapas.php';
require_once '../Model/DAO/ClassEtapasDAO.php';

$cod_ibge = @$_GET['cod_ibge'];
$cod_etapa = @$_GET['cod_etapa'];

$visualizarEtapas = new ClassEtapas();

$visualizarEtapas->setCod_ibge($cod_ibge);
$visualizarEtapas->setCod_etapa($cod_etapa);


$ver = new ClassEtapasDAO();
$dados = $ver->visualizarEtapas($visualizarEtapas);

if($dados) {
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar o municipio.
        </div>
    ';
    header('Location:../View/EtapasCd.php');
}