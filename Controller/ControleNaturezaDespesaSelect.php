<?php

require_once '../Model/DAO/ClassNaturezaDespesaDAO.php';


$buscarNaturezaDespesa = new ClassNaturezaDespesaDAO(); // instanciando um objeto
$selectNaturezaDespesa = $buscarNaturezaDespesa->todosNaturezaDespesa(); // chamando metodo para buscar todos os usuários do banco

if($selectNaturezaDespesa) { // se existir algum municipio no banco então passar o array de selectNaturezaDespesa para a variavel $array_selectNaturezaDespesa
    $array_selectNaturezaDespesa = $selectNaturezaDespesa;
} else {
    // se não receber nenhum dado do banco de selectNaturezaDespesa, então defirnir um array vazio para variavel $array_selectNaturezaDespesa
    $array_selectNaturezaDespesa = [];
}