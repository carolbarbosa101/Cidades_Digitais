<?php
session_start();
require_once '../Model/ClassFatura.php';
require_once '../Model/DAO/ClassFaturaDAO.php';


$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];
$dt_nf = @$_POST['dt_nf'];


//Tem problema se mudar o "novo" pra "nova"?

$editarFatura = new ClassFatura ();
$editarFatura->setNum_nf($num_nf);
$editarFatura->setCod_ibge($cod_ibge);
$editarFatura->setDt_nf($dt_nf);


//var_dump($NovoFatura);
//die();

$classFaturaDAO = new ClassFaturaDAO();
$fatura = $classFaturaDAO->update($editarFatura);


//var_dump($fatura);
//die();

if($fatura == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/Fatura.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$fatura.'
        </div>
    ';
    header('Location:../View/Fatura.php');
}
