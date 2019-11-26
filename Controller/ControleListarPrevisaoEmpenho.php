<?php

require_once '../Model/DAO/ClassPrevisaoEmpenhoDAO.php';


$listar = new ClassPrevisaoEmpenhoDAO(); 
$dados = $listar->listarPrevisaoEmpenho();

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}