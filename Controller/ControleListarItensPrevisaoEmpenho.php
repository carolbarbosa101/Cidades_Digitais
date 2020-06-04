
<?php

require_once '../Model/DAO/ClassItensPrevisaoEmpenhoDAO.php';
$listar = new ClassItensPrevisaoEmpenhoDAO(); // instanciando um objeto

$realizarPesquisa = filter_input(INPUT_GET, "pesquisa", FILTER_SANITIZE_STRING);
/*
 * Quando o usuario realizar uma pesquisa a variavel $realizarPesquisa
 * vai ter valor, ou seja, não será vazia nem null,
 * ai sera chamada o metodo DAO preparado pra receber o valor
 * que está sendo pesquisado e então retornar os dados caso encontre algum
 * compativel com o filtro
 */
if (!empty($realizarPesquisa)) {

    $dados = $listar->listarItensPrevisaoEmpenho($realizarPesquisa); // chamando metodo para listar todos os usuários do banco

} else {

    $dados = $listar->listarItensPrevisaoEmpenho(); // chamando metodo para listar todos os usuários do banco

}


if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados;
} else {
    // se não receber nenhum dado do banco de dados, então defirnir um array vazio para variavel $array_dados
    $array_dados = [];
}