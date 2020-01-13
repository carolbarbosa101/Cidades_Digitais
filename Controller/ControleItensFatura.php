<?php
session_start();
require_once '../Model/ClassItensFatura.php';
require_once '../Model/DAO/ClassItensFaturaDAO.php';


$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];
$cod_empenho = @$_POST['cod_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$valor = 0;
$quantidade = 0;

//var_dump($cod_item);
//die();


$novoItensFatura = new ClassItensFatura ();
$novoItensFatura->setNum_nf($num_nf);
$novoItensFatura->setCod_ibge($cod_ibge);
$novoItensFatura->setCod_empenho($cod_empenho);
$novoItensFatura->setCod_item($cod_item);
$novoItensFatura->setCod_tipo_item($cod_tipo_item);
$novoItensFatura->setValor($valor);
$novoItensFatura->setQuantidade ($quantidade);

//var_dump($novoItensFatura);
//die();

$classItensFaturaDAO = new ClassItensFaturaDAO();
$itensfatura = $classItensFaturaDAO->cadastrar($novoItensFatura);



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

