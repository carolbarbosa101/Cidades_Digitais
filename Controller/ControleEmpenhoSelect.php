<?php

require_once '../Model/DAO/ClassEmpenhoDAO.php';


$buscarEmpenho = new ClassEmpenhoDAO();
$selectEmpenho = $buscarEmpenho->todosEmpenho();

if($selectEmpenho) {
    $array_selectEmpenho = $selectEmpenho;
} else {
   $array_selectEmpenho = [];
}