<?php

require_once '../Model/DAO/ClassEntidadeDAO.php';

$listar = new ClassEntidadeDAO();
$dados = $listar->listarEntidade(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}