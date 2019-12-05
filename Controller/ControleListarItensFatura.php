<?php

require_once '../Model/DAO/ClassItensFaturaDAO.php';

$listar = new ClassItensFaturaDAO();
$dados = $listar->listarItensFatura(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}