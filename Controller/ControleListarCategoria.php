<?php

require_once '../Model/DAO/ClassCategoriaDAO.php';
$listar = new ClassCategoriaDAO(); 
$dados = $listar->listarCategoria(); 

if($dados) { 
    $array_dados = $dados;
} else {
  
    $array_dados = [];
}