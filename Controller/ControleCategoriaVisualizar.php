<?php

require_once '../Model/ClassCategoria.php';
require_once '../Model/DAO/ClassCategoriaDAO.php';

$cod_categoria = @$_GET['cod_categoria'];

$visualizarCategoria = new ClassCategoria();
$visualizarCategoria->setCod_categoria($cod_categoria);

$ver = new ClassCategoriaDAO();
$dados = $ver->visualizarCategoria($visualizarCategoria);

if($dados) { 
    $array_dados = $dados[0];
   
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/Categoria.php');
}