<?php

require_once '../Model/DAO/ClassItensFaturaDAO.php';


$buscarItensFatura = new ClassItensFaturaDAO(); // instanciando um objeto
$selectItensFatura = $buscarItensFatura->todosItensFatura(); // chamando metodo para buscar todos os usuários do banco

if($selectItensFatura) { // se existir algum municipio no banco então passar o array de selectItensFatura para a variavel $array_selectItensFatura
    $array_selectItensFatura = $selectItensFatura;
} else {
    // se não receber nenhum dado do banco de selectItensFatura, então defirnir um array vazio para variavel $array_selectItensFatura
    $array_selectItensFatura = [];
}