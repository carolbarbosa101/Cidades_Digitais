<?php
session_start();
require_once '../Model/ClassFatura.php';
require_once '../Model/DAO/ClassFaturaDAO.php';


$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];
$dt_nf = @$_POST['dt_nf'];


//Tem problema se mudar o "novo" pra "nova"?

$novaFatura = new ClassFatura ();
$novaFatura->setNum_nf($num_nf);
$novaFatura->setCod_ibge($cod_ibge);
$novaFatura->setDt_nf($dt_nf);

$classFaturaDAO = new ClassFaturaDAO();
$fatura = $classFaturaDAO->cadastrar($novaFatura);

//var_dump($fatura);
//die();

if($fatura == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Fatura.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$fatura.'
        </div>
    ';
    header('Location:../View/Fatura.php');
}

