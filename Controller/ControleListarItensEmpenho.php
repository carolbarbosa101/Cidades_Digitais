<?php

require_once '../Model/DAO/ClassItensEmpenhoDAO.php';
$listar = new ClassItensEmpenhoDAO();

$realizarPesquisa = filter_input(INPUT_GET, "pesquisa", FILTER_SANITIZE_STRING);
if (!empty($realizarPesquisa)) {

    $dados = $listar->listarItensEmpenhoFiltrarPesquisa($realizarPesquisa); // chamando metodo para listar todos os usuários do banco

} else {
    $dados = $listar->listarItensEmpenho(); // chamando metodo para listar todos os usuários do banco
}

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados;
} else {
    // se não receber nenhum dado do banco de dados, então defirnir um array vazio para variavel $array_dados
    $array_dados = [];
}
