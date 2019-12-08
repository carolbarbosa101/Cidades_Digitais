<?php
require_once '../Model/DAO/ClassUacomDAO.php';

$buscarUacom = new ClassUacomDAO();
$selectUacom = $buscarUacom->todosUacom(); 

if($selectUacom) { 
    $array_selectUacom = $selectUacom;
} else {
  
    $array_selectUacom = [];
}