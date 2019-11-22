<?php

require_once '../Model/ClassTipologia.php';
require_once '../Model/DAO/ClassTipologiaDAO.php';

$cod_tipologia = @$_GET['cod_tipologia'];

$visualizarTipologia = new ClassTipologia();
$visualizarTipologia->setCod_tipologia($cod_tipologia);

$ver = new ClassTipologiaDAO();
$dados = $ver->visualizarTipologia($visualizarTipologia);


if($dados) { 
    $array_dados = $dados[0];
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/Tipologia.php');
}