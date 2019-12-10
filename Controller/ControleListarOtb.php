<?php

require_once '../Model/DAO/ClassOtbDAO.php';
$listar = new ClassOtbDAO(); 
$dados = $listar->listarOtb(); 

if($dados) { 
      $array_dados = $dados;
} else {
    $array_dados = [];
}