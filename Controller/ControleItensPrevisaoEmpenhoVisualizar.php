<?php

require_once '../Model/ClassItensPrevisaoEmpenho.php';
require_once '../Model/DAO/ClassItensPrevisaoEmpenhoDAO.php';

$cod_previsao_empenho = @$_GET['cod_previsao_empenho'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];
$cod_lote = @$_GET['cod_lote'];

$visualizarItensPrevisaoEmpenho = new ClassItensPrevisaoEmpenho();

$visualizarItensPrevisaoEmpenho->setCod_previsao_empenho($cod_previsao_empenho);
$visualizarItensPrevisaoEmpenho->setCod_item($cod_item);
$visualizarItensPrevisaoEmpenho->setCod_tipo_item($cod_tipo_item);
$visualizarItensPrevisaoEmpenho->setCod_lote($cod_lote);

//var_dump($visualizarItensPrevisaoEmpenho);
//    die;

$ver = new ClassItensPrevisaoEmpenhoDAO(); // instanciando um objeto
$dados = $ver->visualizarItensPrevisaoEmpenho($visualizarItensPrevisaoEmpenho); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar a itens_empenho.
        </div>
    ';
    header('Location:../View/ItensPrevisaoEmpenho.php');
}