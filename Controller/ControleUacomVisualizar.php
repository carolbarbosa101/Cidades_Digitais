<?php

require_once '../Model/ClassUacom.php';
require_once '../Model/DAO/ClassUacomDAO.php';

$cod_ibge = @$_GET['cod_ibge'];
$data = @$_GET['data'];

$visualizarUacom = new ClassUacom();
$visualizarUacom->setCod_ibge($cod_ibge);
$visualizarUacom->setData($data);

$ver = new ClassUacomDAO();
$dados = $ver->visualizarUacom($visualizarUacom);

if($dados) { 
    $array_dados = $dados[0];
    
   
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/Uacom.php');
}