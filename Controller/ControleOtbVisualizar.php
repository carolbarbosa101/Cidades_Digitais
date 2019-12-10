<?php

require_once '../Model/ClassOtb.php';
require_once '../Model/DAO/ClassOtbDAO.php';

$cod_otb = @$_GET['cod_otb'];

$visualizarOtb = new ClassOtb();
$visualizarOtb->setCod_otb($cod_otb);

$ver = new ClassOtbDAO();
$dados = $ver->visualizarOtb($visualizarOtb);

if($dados) { 
    $array_dados = $dados[0];
    
   
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/Otb.php');
}