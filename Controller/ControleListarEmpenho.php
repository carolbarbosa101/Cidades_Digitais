<?php

require_once '../Model/DAO/ClassEmpenhoDAO.php';

$listar = new ClassEmpenhoDAO();
$dados = $listar->listarEmpenho(); 

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

    $contador = $listar->listarEmpenho(); // Conta o número total de registros
    $dados = $listar->listarEmpenhoFiltrarPesquisa($realizarPesquisa, $inicio, $maximo); // chamando metodo para listar todos os usuários do banco
    $total=count($contador);
    $menos = $pagina - 1;
    $mais = $pagina + 1;
    $pgs = ceil($total / $maximo);
} else {
    
    $contador = $listar->listarEmpenho(); // Conta o número total de registros
    $dados = $listar->listarEmpenhoPag($inicio, $maximo); // chamando metodo para listar todos os registros com a paginação
    $total=count($contador);
    $menos = $pagina - 1;
    $mais = $pagina + 1;
    $pgs = ceil($total / $maximo);
}

if($dados) { 
    $array_dados = $dados;
} else {
    $array_dados = [];
}