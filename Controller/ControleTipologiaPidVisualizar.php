<?php

require_once '../Model/ClassTipologiaPid.php';
require_once '../Model/DAO/ClassTipologiaPidDAO.php';

$cod_pid = @$_GET['cod_pid'];
$cod_tipologia = @$_GET['cod_tipologia'];

$visualizarTipologiaPid = new ClassTipologiaPid();
$visualizarTipologiaPid->setCod_pid($cod_pid);
$visualizarTipologiaPid->setCod_tipologia($cod_tipologia);

$ver = new ClassTipologiaPidDAO();
$dados = $ver->visualizarTipologiaPid($visualizarTipologiaPid);


if($dados) { 
    $array_dados = $dados[0];
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/TipologiaPid.php');
}