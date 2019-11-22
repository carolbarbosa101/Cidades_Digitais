<?php
require_once '../Model/DAO/ClassPidDAO.php';

$buscarPid = new ClassPidDAO();
$selectPid = $buscarPid->todosPid(); 

if($selectPid) { 
    $array_selectPid = $selectPid;
} else {
  
    $array_selectPid = [];
}