<?php
session_start();
require_once '../Model/ClassEtapas.php';
require_once '../Model/DAO/ClassEtapasDAO.php';



$cod_ibge = @$_POST['cod_ibge'];
$cod_etapa = @$_POST['cod_etapa'];
$dt_inicio = @$_POST['dt_inicio'];
$dt_fim = @$_POST['dt_fim'];
$responsavel = @$_POST['responsavel'];



$novaEtapa = new ClassEtapas();
$novaEtapa->setCod_ibge($cod_ibge);
$novaEtapa->setCod_etapa($cod_etapa);
$novaEtapa->setDt_inicio($dt_inicio);
$novaEtapa->setDt_fim($dt_fim);
$novaEtapa->setResponsavel($responsavel);

$classEtapasDAO = new ClassEtapasDAO();
$etapas = $classEtapasDAO->update($novaEtapa);


//var_dump($etapas);
//die();

if($etapas == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/EtapasCd.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$etapas.'
        </div>
    ';
    header('Location:../View/EtapasCd.php');
}
