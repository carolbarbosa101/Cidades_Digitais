<?php
session_start();
require_once '../Model/ClassItensFatura.php';
require_once '../Model/DAO/ClassItensFaturaDAO.php';


$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];
$cod_empenho = @$_POST['cod_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$valor = @$_POST['valor'];
$quantidade = @$_POST['quantidade'];


//Tem problema se mudar o "novo" pra "nova"?

$novaItensFatura = new ClassItensFatura ();
$novaItensFatura->setNum_nf($num_nf);
$novaItensFatura->setCod_ibge($cod_ibge);
$novaItensFatura->setCod_empenho($cod_empenho);
$novaItensFatura->setCod_item($cod_item);
$novaItensFatura->setCod_tipo_item($cod_tipo_item);
$novaItensFatura->setValor($valor);
$novaItensFatura->setQuantidade ($quantidade);

$classItensFaturaDAO = new ClassItensFaturaDAO();
$itensfatura = $classItensFaturaDAO->cadastrar($novaItensFatura);

var_dump($itensfatura);
die();

if($itensfatura == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/ItensFatura.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$itensfatura.'
        </div>
    ';
    header('Location:../View/ItensFatura.php');
}

