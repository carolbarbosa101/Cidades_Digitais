<?php

require_once '../Model/DAO/ClassTipologiaPidDAO.php';
$listar = new ClassTipologiaPidDAO();
$dados = $listar->listarTipologiaPid(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}