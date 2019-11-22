<?php

require_once '../Model/DAO/ClassContatoDAO.php';


$buscarContato = new ClassContatoDAO(); 
$selectContato = $buscarContato->todosContato(); 

if($selectContato) { 
    $array_selectContato = $selectContato;
} else {
  
    $array_selectContato = [];
}