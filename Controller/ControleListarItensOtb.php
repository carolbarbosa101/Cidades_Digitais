<?php

require_once '../Model/DAO/ClassItensOtbDAO.php';

$listar = new ClassItensOtbDAO();
$dados = $listar->listarItensOtb(); 

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}