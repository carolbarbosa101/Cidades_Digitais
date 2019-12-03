<?php
require_once '../Model/DAO/ClassItensDAO.php';

$buscarItens = new ClassItensDAO();
$selectItens = $buscarItens->todosItens(); 


if($selectItens) { 
    $array_selectItens = $selectItens;
} else {
  
    $array_selectItens = [];
}