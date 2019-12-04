<?php
require_once '../Model/DAO/ClassTipoItemDAO.php';

$buscarTipoItem = new ClassTipoItemDAO();
$selectTipoItem = $buscarTipoItem->todosTipoItem(); 

if($selectTipoItem) { 
    $array_selectTipoItem = $selectTipoItem;
} else {
  
    $array_selectTipoItem = [];
}