<?php

require_once '../Model/ClassItensFatura.php';
require_once '../Model/DAO/ClassItensFaturaDAO.php';

$num_nf = @$_GET['num_nf'];
$cod_ibge = @$_GET['cod_ibge'];
$cod_empenho = @$_GET['cod_empenho'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

$visualizarItensFatura = new ClassItensFatura();
$visualizarItensFatura->setNum_nf($num_nf);
$visualizarItensFatura->setCod_ibge($cod_ibge);
$visualizarItensFatura->setCod_empenho($cod_empenho);
$visualizarItensFatura->setCod_item($cod_item);
$visualizarItensFatura->setCod_tipo_item($cod_tipo_item);

$ver = new ClassItensFaturaDAO(); // instanciando um objeto
$dados = $ver->visualizarItensFatura($visualizarItensFatura); // chamando metodo para listar todos os usuários do banco

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
    header('Location:../View/ItensFatura.php');
}