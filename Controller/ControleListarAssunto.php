<?php

require_once '../Model/DAO/ClassAssuntoDAO.php';
$listar = new ClassAssuntoDAO(); // instanciando um objeto
$dados = $listar->listarAssunto(); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum assunto no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados;
} else {
    // se não receber nenhum dado do banco de dados, então defirnir um array vazio para variavel $array_dados
    $array_dados = [];
}