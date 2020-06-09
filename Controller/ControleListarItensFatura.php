<?php
require_once '../Model/DAO/ClassItensFaturaDAO.php';
$listar = new ClassItensFaturaDAO(); 
$realizarPesquisa = filter_input(INPUT_GET, "pesquisa", FILTER_SANITIZE_STRING);
if (!empty($realizarPesquisa)) {

    $dados = $listar->listarItensFaturaFiltrarPesquisa($realizarPesquisa); 
} else {
    $dados = $listar->listarItensFatura(); 
}

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}