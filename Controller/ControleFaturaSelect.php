<?php

require_once '../Model/ClassFatura.php';
require_once '../Model/DAO/ClassFaturaDAO.php';


$buscarFatura = new ClassFaturaDAO(); // instanciando um objeto
$selectFatura = $buscarFatura->todosFatura(); // chamando metodo para buscar todos os usuários do banco

if($selectFatura) { // se existir alguma fatura no banco então passar o array de selectFatura para a variavel $array_selectFatura
    $array_selectFatura = $selectFatura;
} else {
    // se não receber nenhum dado do banco de selectFatura, então defirnir um array vazio para variavel $array_selectFatura
    $array_selectFatura = [];
}