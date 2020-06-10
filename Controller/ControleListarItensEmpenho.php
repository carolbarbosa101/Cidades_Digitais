<?php

require_once '../Model/DAO/ClassItensEmpenhoDAO.php';
$listar = new ClassItensEmpenhoDAO();


// Maximo de registros por pagina
$maximo = 100;
// Declaração da pagina inicial

$pagina = $_GET["pagina"];
if($pagina == "") {
    $pagina = "1";
}
// Calculando o registro inicial
$inicio = $pagina - 1;
$inicio = $maximo * $inicio;


$realizarPesquisa = filter_input(INPUT_GET, "pesquisa", FILTER_SANITIZE_STRING);
if (!empty($realizarPesquisa)) {

    $contador = $listar->listarItensEmpenho(); // Conta o número total de registros
    $dados = $listar->listarItensEmpenhoFiltrarPesquisa($realizarPesquisa, $inicio, $maximo); // chamando metodo para listar todos os usuários do banco
    $total=count($contador);
    $menos = $pagina - 1;
    $mais = $pagina + 1;
    $pgs = ceil($total / $maximo);
} else {
    
    $contador = $listar->listarItensEmpenho(); // Conta o número total de registros
    $dados = $listar->listarItensEmpenhoPag($inicio, $maximo); // chamando metodo para listar todos os registros com a paginação
    $total=count($contador);
    $menos = $pagina - 1;
    $mais = $pagina + 1;
    $pgs = ceil($total / $maximo);
}

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados;
} else {
    // se não receber nenhum dado do banco de dados, então defirnir um array vazio para variavel $array_dados
    $array_dados = [];
}
