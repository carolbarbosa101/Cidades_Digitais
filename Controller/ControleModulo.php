<?php
session_start();
require_once '../Model/ClassModulo.php';
require_once '../Model/DAO/ClassModuloDAO.php';

$cod_modulo = @$_POST['cod_modulo'];
$categoria_1 = @$_POST['categoria_1'];
$categoria_2 = @$_POST['categoria_2'];
$categoria_3 = @$_POST['categoria_3'];
$descricao = @$_POST['descricao'];


$novoModulo = new ClassModulo();
$novoModulo->setCod_modulo($cod_modulo);
$novoModulo->setCategoria_1($categoria_1);
$novoModulo->setCategoria_2($categoria_2);
$novoModulo->setCategoria_3($categoria_3);
$novoModulo->setDescricao($descricao);


$classModuloDAO = new ClassModuloDAO();
$modulo = $classModuloDAO->cadastrar($novoModulo);

//var_dump($modulo);
//die();

if($modulo == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Modulo.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$modulo.'
        </div>
    ';
    header('Location:../View/Modulo.php');
}

