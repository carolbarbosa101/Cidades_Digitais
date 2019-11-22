<?php
session_start();
require_once '../Model/ClassPid.php';
require_once '../Model/DAO/ClassPidDAO.php';


$cod_pid = @$_POST['cod_pid'];
$cod_ibge = @$_POST['cod_ibge'];
$nome = @$_POST['nome'];
$inep = @$_POST['inep'];


$novoPid = new ClassPid();
$novoPid->setCod_pid($cod_pid);
$novoPid->setCod_ibge($cod_ibge);
$novoPid->setNome($nome);
$novoPid->setInep($inep);

$classPidDAO = new ClassPidDAO();
$pid = $classPidDAO->cadastrar($novoPid);

//var_dump($pid);
//die();

if(!empty($pid)){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Ponto.php?cod_pid='.$pid[0]['cod_pid'].'&cod_ibge='.$pid[0]['cod_ibge']);
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$pid.'
        </div>
    ';
    header('Location:../View/Pid.php');
}

