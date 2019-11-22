<?php

require_once '../Model/DAO/ClassReajusteDAO.php';


$listar = new ClassReajusteDAO(); // instanciando um objeto
$dados = $listar->listarReajuste(); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum Reajuste no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados;
} else {
    // se não receber nenhum dado do banco de dados, então defirnir um array vazio para variavel $array_dados
    $array_dados = [];
}