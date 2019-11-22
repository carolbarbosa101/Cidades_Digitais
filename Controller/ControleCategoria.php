<?php
session_start();
require_once '../Model/ClassCategoria.php';
require_once '../Model/DAO/ClassCategoriaDAO.php';


$cod_categoria = @$_POST['cod_categoria'];
$descricao = @$_POST['descricao'];

$novoCategoria = new ClassCategoria();
$novoCategoria->setCod_categoria($cod_categoria);
$novoCategoria->setDescricao($descricao);



$classCategoriaDAO = new ClassCategoriaDAO();
$categoria = $classCategoriaDAO->cadastrar($novoCategoria);

if($categoria == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Categoria.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$categoria.'
        </div>
    ';
    header('Location:../View/Categoria.php');
}