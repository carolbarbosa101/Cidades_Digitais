<?php

require_once '../Model/DAO/ClassCdItensDAO.php';


$listar = new ClassCdItensDAO(); 
$dados = $listar->listarCdItens();

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}