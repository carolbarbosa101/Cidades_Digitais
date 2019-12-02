<?php
session_start();
require_once '../Model/ClassPrevisaoEmpenho.php';
require_once '../Model/DAO/ClassPrevisaoEmpenhoDAO.php';


$cod_previsao_empenho = @$_POST['cod_previsao_empenho'];
$cod_lote = @$_POST['cod_lote'];
$cod_natureza_despesa = @$_POST['cod_natureza_despesa'];
$data = @$_POST['data'];
$tipo = @$_POST['tipo'];
$ano_referencia = @$_POST['ano_referencia'];



$novoPrevisaoEmpenho = new ClassPrevisaoEmpenho ();
$novoPrevisaoEmpenho->setCod_previsao_empenho($cod_previsao_empenho);
$novoPrevisaoEmpenho->setCod_lote($cod_lote);
$novoPrevisaoEmpenho->setCod_natureza_despesa($cod_natureza_despesa);
$novoPrevisaoEmpenho->setData($data);
$novoPrevisaoEmpenho->setTipo($tipo);
$novoPrevisaoEmpenho->setAno_referencia($ano_referencia);

//var_dump($novoPrevisaoEmpenho);
//die();


$classPrevisaoEmpenhoDAO = new ClassPrevisaoEmpenhoDAO();
$previsao_empenho = $classPrevisaoEmpenhoDAO->cadastrar($novoPrevisaoEmpenho);


if($previsao_empenho == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/PrevisaoEmpenho.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$previsao_empenho.'
        </div>
    ';
    header('Location:../View/PrevisaoEmpenho.php');
}

