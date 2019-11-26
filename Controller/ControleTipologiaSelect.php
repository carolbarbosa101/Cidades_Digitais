<?php

require_once '../Model/DAO/ClassTipologiaDAO.php';


$buscarTipologia = new ClassTipologiaDAO(); // instanciando um objeto
$selectTipologia = $buscarTipologia->todosTipologia(); // chamando metodo para buscar todos os usuários do banco

if($selectTipologia) { // se existir alguma Tipologia no banco então passar o array de selectTipologia para a variavel $array_selectTipologia
    $array_selectTipologia = $selectTipologia;
} else {
    // se não receber nenhum dado do banco de selectTipologia, então defirnir um array vazio para variavel $array_selectTipologia
    $array_selectTipologia = [];
}