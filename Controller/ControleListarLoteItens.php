<?php
require_once '../Model/DAO/ClassLoteItensDAO.php';
$listar = new ClassLoteItensDAO(); 
$dados = $listar->listarLoteItens();
if($dados) { 
    $array_dados = $dados;
} else {
     $array_dados = [];
}