
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
$categoria = $classCategoriaDAO->update($novoCategoria);

//var_dump($categoria);
//die();

if($categoria == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Categoria.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$categoria.'
        </div>
    ';
    header('Location:../View/Categoria.php');
}

