<?php

require_once '../Model/DAO/ClassCdDAO.php';


$buscarCd = new ClassCdDAO(); // instanciando um objeto
$selectCd = $buscarCd->todosCd(); // chamando metodo para buscar todos os usuários do banco

if($selectCd) { // se existir algum municipio no banco então passar o array de selectCd para a variavel $array_selectCd
    $array_selectCd = $selectCd;
} else {
    // se não receber nenhum dado do banco de selectCd, então defirnir um array vazio para variavel $array_selectCd
    $array_selectCd = [];
}