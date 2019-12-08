<?php

require_once '../Model/DAO/ClassFaturaOtbDAO.php';

$listar = new ClassFaturaOtbDAO();
$dados = $listar->listarFaturaOtb(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}