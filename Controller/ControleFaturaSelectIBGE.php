<?php

require_once '../Model/ClassFatura.php';
require_once '../Model/DAO/ClassFaturaDAO.php';


$buscarIBGE = new ClassFaturaDAO(); // instanciando um objeto
$array_selectIBGE = $buscarIBGE->todosIBGE(); // chamando metodo para buscar todos os usuários do banco

if($array_selectIBGE) { // se existir alguma fatura no banco então passar o array de array_selectIBGE para a variavel $array_array_selectIBGE
    $array_array_selectIBGE = $array_selectIBGE;
} else {
    // se não receber nenhum dado do banco de array_selectIBGE, então defirnir um array vazio para variavel $array_array_selectIBGE
    $array_array_selectIBGE = [];
}

