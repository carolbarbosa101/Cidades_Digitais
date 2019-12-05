<?php

require_once '../Model/DAO/ClassUacomAssuntoDAO.php';


$listar = new ClassUacomAssuntoDAO(); 
$dados = $listar->listarUacomAssunto(); 

if($dados) { 
      $array_dados = $dados;
} else {
    $array_dados = [];
}