<?php

require_once '../Model/DAO/ClassEtapaDAO.php';


$buscarEtapa = new ClassEtapasDAO(); // instanciando um objeto
$selectEtapa = $buscarEtapa->todosEtapa(); // chamando metodo para buscar todos os usuários do banco

if($selectEtapa) { // se existir algum municipio no banco então passar o array de selectEtapa para a variavel $array_selectEtapa
    $array_selectEtapa = $selectEtapa;
} else {
    // se não receber nenhum dado do banco de selectEtapa, então defirnir um array vazio para variavel $array_selectEtapa
    $array_selectEtapa = [];
}