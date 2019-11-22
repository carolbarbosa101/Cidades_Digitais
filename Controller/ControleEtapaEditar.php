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


$novoEtapa = new ClassEtapa();
$novoEtapa->setCod_etapa($cod_etapa);
$novoEtapa->setDescricao($descricao);
$novoEtapa->setDuracao($duracao);
$novoEtapa->setDepende($depende);
$novoEtapa->setDelay($delay);
$novoEtapa->setSetor_resp($setor_resp);


$classEtapaDAO = new ClassEtapaDAO();
$etapa = $classEtapaDAO->update($novoEtapa);

//var_dump($etapa);
//die();

if($etapa == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Etapa.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$etapa.'
        </div>
    ';
    header('Location:../View/Etapa.php');
}

