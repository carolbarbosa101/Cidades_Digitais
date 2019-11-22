<?php

require_once '../Model/DAO/ClassContatoDAO.php';
$listar = new ClassContatoDAO();
$dados = $listar->listarContato(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}