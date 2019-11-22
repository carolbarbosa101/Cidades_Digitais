<?php
require_once '../Model/DAO/ClassPidDAO.php';

$listar = new ClassPidDAO(); 
$dados = $listar->listarPid();

if($dados) { 
    $array_dados = $dados;
} else {

    $array_dados = [];
}