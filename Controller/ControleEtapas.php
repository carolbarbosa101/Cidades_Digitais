<?php
session_start();
require_once '../Model/ClassEtapas.php';
require_once '../Model/DAO/ClassEtapasDAO.php';


$cod_ibge = @$_POST['cod_ibge'];
$cod_etapa = @$_POST['cod_etapa'];
$dt_inicio = @$_POST['dt_inicio'];
$dt_fim = @$_POST['dt_fim'];
$responsavel = @$_POST['responsavel'];

$novaetapa = new ClassEtapas();
$novaetapa->setCod_ibge($cod_ibge);
$novaetapa->setCod_etapa($cod_etapa);
$novaetapa->setDt_inicio($dt_inicio);
$novaetapa->setDt_fim($dt_fim);
$novaetapa->setResponsavel($responsavel);

$classEtapasDAO = new ClassEtapasDAO();
$etapas = $classEtapasDAO->cadastrar($novaetapa);

//var_dump($etapas);
//die;
if($etapas == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/EtapasCd.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado .
        </div>
    ';
    header('Location:../View/EtapasCd.php');
}

