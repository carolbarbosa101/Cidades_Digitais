<?php
session_start();
require_once '../Model/ClassTipologiaPid.php';
require_once '../Model/DAO/ClassTipologiaPidDAO.php';


$cod_pid = @$_POST['cod_pid'];
$cod_tipologia = @$_POST['cod_tipologia'];

$novoTipologiaPid = new ClassTipologiaPid();
$novoTipologiaPid->setCod_pid($cod_pid);
$novoTipologiaPid->setCod_tipologia($cod_tipologia);


//var_dump($novoTipologiaPid);
//die();

$classTipologiaPidDAO = new ClassTipologiaPidDAO();
$tipologiapid = $classTipologiaPidDAO->cadastrar($novoTipologiaPid);

if($tipologiapid == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
   
    header('Location:../View/TipologiaPid.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$tipologiapid.'
        </div>
    ';
    header('Location:../View/TipologiaPid.php');
}