<?php

require_once '../Model/DAO/ClassEntidadeDAO.php';


$buscarEntidade = new ClassEntidadeDAO(); // instanciando um objeto
$selectEntidade = $buscarEntidade->todosEntidade(); // chamando metodo para buscar todos os usuários do banco

if($selectEntidade) { // se existir alguma entidade no banco então passar o array de selectEntidade para a variavel $array_selectEntidade
    $array_selectEntidade = $selectEntidade;
} else {
    // se não receber nenhum dado do banco de selectEntidade, então defirnir um array vazio para variavel $array_selectEntidade
    $array_selectEntidade = [];
}