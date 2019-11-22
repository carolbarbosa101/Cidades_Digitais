<?php

require_once '../Model/DAO/ClassLoteDAO.php';
$listar = new ClassLoteDAO(); // instanciando um objeto
$dados = $listar->listarLote(); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados;
} else {
    // se não receber nenhum dado do banco de dados, então defirnir um array vazio para variavel $array_dados
    $array_dados = [];
}