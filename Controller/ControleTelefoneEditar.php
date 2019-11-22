<?php
session_start();
require_once '../Model/ClassTelefone.php';
require_once '../Model/DAO/ClassTelefoneDAO.php';


$cod_telefone = @$_POST['cod_telefone'];
$cod_contato = @$_POST['cod_contato'];
$telefone = @$_POST['telefone'];
$tipo = @$_POST['tipo'];



$novoTelefone = new ClassTelefone();
$novoTelefone->setCod_telefone($cod_telefone);
$novoTelefone->setCod_contato($cod_contato);
$novoTelefone->setTelefone($telefone);
$novoTelefone->setTipo($tipo);


$classTelefoneDAO = new ClassTelefoneDAO();
$telefone = $classTelefoneDAO->update($novoTelefone);

//var_dump($telefone);
//die();

if($telefone == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Telefone.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$telefone.'
        </div>
    ';
    header('Location:../View/Telefone.php');
}

