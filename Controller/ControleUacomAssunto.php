<?php
session_start();
require_once '../Model/ClassUacomAssunto.php';
require_once '../Model/DAO/ClassUacomAssuntoDAO.php';


$cod_ibge = @$_POST['cod_ibge'];
$data = @$_POST['data'];
$cod_assunto = @$_POST['cod_assunto'];


$novoUacomAssunto = new ClassUacomAssunto();
$novoUacomAssunto->setCod_ibge($cod_ibge);
$novoUacomAssunto->setData($data);
$novoUacomAssunto->setCod_assunto($cod_assunto);

$classUacomAssuntoDAO = new ClassUacomAssuntoDAO();
$uacomassunto = $classUacomAssuntoDAO->cadastrar($novoUacomAssunto);

var_dump($uacomassunto);
die();

if($uacomassunto == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/UacomAssunto.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$uacomassunto.'
        </div>
    ';
    header('Location:../View/UacomAssunto.php');
}

