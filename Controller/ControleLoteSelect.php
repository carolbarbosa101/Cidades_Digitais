<?php

require_once '../Model/DAO/ClassLoteDAO.php';


$buscarLote = new ClassLoteDAO(); // instanciando um objeto
$selectLote = $buscarLote->todosLote(); // chamando metodo para buscar todos os usuários do banco

if($selectLote) { // se existir algum Lote no banco então passar o array de selectLote para a variavel $array_selectLote
    $array_selectLote = $selectLote;
} else {
    // se não receber nenhum dado do banco de selectLote, então defirnir um array vazio para variavel $array_selectLote
    $array_selectLote = [];
}