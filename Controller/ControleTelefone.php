<?php
session_start();
require_once '../Model/ClassTelefone.php';
require_once '../Model/DAO/ClassTelefoneDAO.php';





$cod_contato = @$_POST['cod_contato'];
$telefone = @$_POST['telefone'];
$tipo = @$_POST['tipo'];


$novoTelefone = new ClassTelefone();

$novoTelefone->setCod_contato($cod_contato);
$novoTelefone->setTelefone($telefone);
$novoTelefone->setTipo($tipo);



$classTelefoneDAO = new ClassTelefoneDAO();
$telefone = $classTelefoneDAO->cadastrar($novoTelefone);


//var_dump($telefone);
//die();

if($telefone == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Telefone.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$telefone.'
        </div>
    ';
    header('Location:../View/Telefone.php');
}