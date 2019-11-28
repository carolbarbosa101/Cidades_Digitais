<?php

require_once '../Model/DAO/ClassFaturaDAO.php';

$listar = new ClassFaturaDAO();
$dados = $listar->listarFatura(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}