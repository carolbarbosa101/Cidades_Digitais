<?php

require_once '../Model/DAO/ClassEmpenhoDAO.php';


$buscarEmpenho = new ClassEmpenhoDAO(); // instanciando um objeto
$selectEmpenho = $buscarEmpenho->todosEmpenho(); // chamando metodo para buscar todos os usuários do banco

if($selectEmpenho) { // se existir alguma empenho no banco então passar o array de selectEmpenho para a variavel $array_selectEmpenho
    $array_selectEmpenho = $selectEmpenho;
} else {
    // se não receber nenhum dado do banco de selectEmpenho, então defirnir um array vazio para variavel $array_selectEmpenho
    $array_selectEmpenho = [];
}