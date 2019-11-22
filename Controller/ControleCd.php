<?php
session_start();
require_once '../Model/ClassCd.php';
require_once '../Model/DAO/ClassCdDAO.php';


$cod_ibge = @$_POST['cod_ibge'];
$cod_lote = @$_POST['cod_lote'];
$os_pe = @$_POST['os_pe'];
$data_pe = @$_POST['data_pe'];
$os_imp = @$_POST['os_imp'];
$data_imp = @$_POST['data_imp'];


$novoCd = new ClassCd();
$novoCd ->setCod_ibge($cod_ibge);
$novoCd->setCod_lote($cod_lote);
$novoCd->setOs_pe($os_pe);
$novoCd->setData_pe($data_pe);
$novoCd->setOs_imp($os_imp);
$novoCd->setData_imp($data_imp);



$classCdDAO = new ClassCdDAO();
$cd = $classCdDAO->cadastrar($novoCd);
//var_dump($cd);
//die();
if($cd == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Cd.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$cd.'
        </div>
    ';
    header('Location:../View/Cd.php');
}

