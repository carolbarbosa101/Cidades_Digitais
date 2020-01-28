<?php

require_once '../Model/ClassItensEmpenho.php';
require_once '../Model/DAO/ClassItensEmpenhoDAO.php';

$id_empenho = @$_GET['id_empenho'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];
$cod_previsao_empenho = @$_GET['cod_previsao_empenho'];

$visualizarItensEmpenho = new ClassItensEmpenho();

$visualizarItensEmpenho->setCod_empenho($id_empenho);
$visualizarItensEmpenho->setCod_item($cod_item);
$visualizarItensEmpenho->setCod_tipo_item($cod_tipo_item);
$visualizarItensEmpenho->setCod_previsao_empenho($cod_previsao_empenho);

$ver = new ClassItensEmpenhoDAO(); // instanciando um objeto
$dados = $ver->visualizarItensEmpenho($visualizarItensEmpenho); // chamando metodo para listar todos os usuários do banco

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
    header('Location:../View/ItensEmpenho.php');
}