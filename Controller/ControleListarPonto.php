<?php
require_once '../Model/DAO/ClassPontoDAO.php';

$listar = new ClassPontoDAO(); 
$dados = $listar->listarPonto();

if($dados) { 
    $array_dados = $dados;
} else {

    $array_dados = [];
}