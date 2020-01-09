<?php

require_once '../Model/DAO/ClassItensPrevisaoEmpenhoDAO.php';

$listar = new ClassItensPrevisaoEmpenhoDAO();
$dados = $listar->listarItensPrevisaoEmpenho(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}