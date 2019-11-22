<?php

require_once '../Model/DAO/ClassCategoriaDAO.php';


$buscarCategoria = new ClassCategoriaDAO(); 
$selectCategoria = $buscarCategoria->todosCategoria(); 

if($selectCategoria) { 
     $array_selectCategoria = $selectCategoria;
} else {
     $array_selectCategoria = [];
}