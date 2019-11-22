<?php
session_start();

$cod_categoria = @$_GET["cod_categoria"];

if (empty($cod_categoria)) {
	header('Location:../View/Categoria.php');
}

require_once '../Model/ClassCategoria.php';
require_once '../Model/DAO/ClassCategoriaDAO.php';

$apagarCategoria = new ClassCategoriaDAO();
$categoria = new ClassCategoria();
$categoria->setCod_categoria($cod_categoria);
$categoria->setDescricao($descricao);

$resultado = $apagarCategoria->apagarCategoria($categoria);

if($resultado) { 
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Categoria.php');
} else {
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar a categoria.
		</div>
	';
    header('Location:../View/Categoria.php');
}