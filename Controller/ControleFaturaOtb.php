<?php
session_start();
require_once '../Model/ClassFaturaOtb.php';
require_once '../Model/DAO/ClassFaturaOtbDAO.php';

$cod_otb = @$_POST['cod_otb'];
$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];



//Tem problema se mudar o "novo" pra "nova"?

$novaFaturaOtb = new ClassFaturaOtb ();
$novaFaturaOtb->setCod_otb($cod_otb);
$novaFaturaOtb->setNum_nf($num_nf);
$novaFaturaOtb->setCod_ibge($cod_ibge);

//var_dump($novaFaturaOtb);
//die();

$classFaturaOtbDAO = new ClassFaturaOtbDAO();
$fatura_otb = $classFaturaOtbDAO->cadastrar($novaFaturaOtb);

//var_dump($fatura_otb);
//die();

if($fatura_otb == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/FaturaOtb.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$fatura_otb.'
        </div>
    ';
    header('Location:../View/FaturaOtb.php');
}

