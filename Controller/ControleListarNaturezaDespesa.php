<?php

require_once '../Model/DAO/ClassNaturezaDespesaDAO.php';

$listar = new ClassNaturezaDespesaDAO();
$dados = $listar->listarNaturezaDespesa(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}