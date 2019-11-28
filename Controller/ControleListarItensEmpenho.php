<?php

require_once '../Model/DAO/ClassItensEmpenhoDAO.php';

$listar = new ClassItensEmpenhoDAO();
$dados = $listar->listarItensEmpenho(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}