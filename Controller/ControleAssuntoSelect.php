<?php

require_once '../Model/DAO/ClassAssuntoDAO.php';


$buscarAssunto = new ClassAssuntoDAO(); 
$selectAssunto = $buscarAssunto->todosAssunto(); 

if($selectAssunto) { 
     $array_selectAssunto = $selectAssunto;
} else {
     $array_selectAssunto = [];
}