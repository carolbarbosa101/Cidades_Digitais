<?php

require_once '../Model/DAO/ClassEmpenhoDAO.php';

$listar = new ClassEmpenhoDAO();
$dados = $listar->listarEmpenho(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}