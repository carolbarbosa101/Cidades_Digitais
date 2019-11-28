<?php

require_once '../Model/DAO/ClassItensEmpenhoDAO.php';


$buscarItensEmpenho = new ClassItensEmpenhoDAO(); // instanciando um objeto
$selectItensEmpenho = $buscarItensEmpenho->todosItensEmpenho(); // chamando metodo para buscar todos os usuários do banco

if($selectItensEmpenho) { // se existir alguma itens_empenho no banco então passar o array de selectItensEmpenho para a variavel $array_selectItensEmpenho
    $array_selectItensEmpenho = $selectItensEmpenho;
} else {
    // se não receber nenhum dado do banco de selectItensEmpenho, então defirnir um array vazio para variavel $array_selectItensEmpenho
    $array_selectItensEmpenho = [];
}