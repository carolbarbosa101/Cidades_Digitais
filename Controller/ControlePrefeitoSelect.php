<?php

require_once '../Model/DAO/ClassPrefeitosDAO.php';


$buscarPrefeitos = new ClassPrefeitoDAO(); // instanciando um objeto
$selectPrefeitos = $buscarPrefeitos->todosPrefeitos(); // chamando metodo para buscar todos os usuários do banco

if($selectPrefeitos) { // se existir algum Prefeito no banco então passar o array de selectPrefeitos para a variavel $array_selectPrefeitos
    $array_selectPrefeitos = $selectPrefeitos;
} else {
    // se não receber nenhum dado do banco de selectPrefeitos, então defirnir um array vazio para variavel $array_selectPrefeitos
    $array_selectPrefeitos = [];
}