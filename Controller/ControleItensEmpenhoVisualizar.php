<?php

require_once '../Model/ClassItensEmpenho.php';
require_once '../Model/DAO/ClassItensEmpenho.php';

??????????????????????????????????????????????????????????????????????????????????????????????????????????
// como não tem uma chave primária e só estrangeira, eu fiz um if com todas as estrangeiras

$cod_empenho = @$_POST['cod_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$cod_previsao_empenho = @$_POST['cod_previsao_empenho'];

$visualizarItensEmpenho = new ClassItensEmpenho();
$visualizarItensEmpenho->setCod_empenho($cod_empenho);

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