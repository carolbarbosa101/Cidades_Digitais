<?php
session_start();
require_once '../Model/ClassPonto.php';
require_once '../Model/DAO/ClassPontoDAO.php';

$cod_ponto = @$_POST['cod_ponto'];
$cod_ibge = @$_POST['cod_ibge'];
$cod_categoria = @$_POST['cod_categoria'];
$cod_pid = @$_POST['cod_pid'];
$endereco = @$_POST['endereco'];
$numero = @$_POST['numero'];
$complemento = @$_POST['complemento'];
$bairro = @$_POST['bairro'];
$cep = @$_POST['cep'];
$latitude = @$_POST['latitude'];
$longitude = @$_POST['longitude'];


$novoPonto = new ClassPonto();
$novoPonto->setCod_ponto($cod_ponto);
$novoPonto->setCod_ibge($cod_ibge);
$novoPonto->setCod_categoria($cod_categoria);
$novoPonto->setCod_pid($cod_pid);
$novoPonto->setEndereco($endereco);
$novoPonto->setNumero($numero);
$novoPonto->setComplemento($complemento);
$novoPonto->setBairro($bairro);
$novoPonto->setCep($cep);
if (!empty($latitude)) {
    $novoPonto->setLatitude($latitude);
}
if (!empty($longitude)) {
    $novoPonto->setLongitude($longitude);
}
//var_dump($novoPonto);
//die();

$classPontoDAO = new ClassPontoDAO();
$ponto = $classPontoDAO->update($novoPonto);

//var_dump($ponto);
//die();

if($ponto == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Ponto.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados. '.$ponto.'
        </div>
    ';
  
    header('Location:../View/Ponto.php');
}

