<?php

require_once '../Model/DAO/ClassOtbDAO.php';


$buscarOtb = new ClassOtbDAO(); 
$selectOtb = $buscarOtb->todosOtb(); 

if($selectOtb) { 
     $array_selectOtb = $selectOtb;
} else {
     $array_selectOtb = [];
}