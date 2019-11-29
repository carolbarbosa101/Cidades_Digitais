<?php

require_once '../Model/DAO/ClassPrevisaoEmpenhoDAO.php';


$buscarPrevisaoEmpenho = new ClassPrevisaoEmpenhoDAO(); // instanciando um objeto
$selectPrevisaoEmpenho = $buscarPrevisaoEmpenho->todosPrevisaoEmpenho(); // chamando metodo para buscar todos os usuários do banco

if($selectPrevisaoEmpenho) { // se existir algum Prefeito no banco então passar o array de selectPrevisaoEmpenho para a variavel $array_selectPrevisaoEmpenho
    $array_selectPrevisaoEmpenho = $selectPrevisaoEmpenho;
} else {
    // se não receber nenhum dado do banco de selectPrevisaoEmpenho, então defirnir um array vazio para variavel $array_selectPrevisaoEmpenho
    $array_selectPrevisaoEmpenho = [];
}