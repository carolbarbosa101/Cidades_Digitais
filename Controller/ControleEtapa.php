<?php
session_start();
require_once '../Model/ClassEtapa.php';
require_once '../Model/DAO/ClassEtapaDAO.php';


$cod_etapa = @$_POST['cod_etapa'];
$descricao = @$_POST['descricao'];
$duracao = @$_POST['duracao'];
$depende = @$_POST['depende'];
$delay = @$_POST['delay'];
$setor_resp = @$_POST['setor_resp'];

$novaettapa = new ClassEtapa();
$novaettapa->setCod_etapa($cod_etapa);
$novaettapa->setDescricao($descricao);
$novaettapa->setDuracao($duracao);
$novaettapa->setDepende($depende);
$novaettapa->setDelay($delay);
$novaettapa->setSetor_resp($setor_resp);

$classEtapaDAO = new ClassEtapaDAO();
$etapa = $classEtapaDAO->cadastrar($novaettapa);

//var_dump($etapa);
//die;
if($etapa == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Etapa.php');
} else { 
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado .
        </div>
    ';
    header('Location:../View/Etapa.php');
}

