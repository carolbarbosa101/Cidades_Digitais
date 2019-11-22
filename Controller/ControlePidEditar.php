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
$pid = $classPidDAO->update($novoPid);



//var_dump($pid);
//die();

if($pid == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Pid.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$pid.'
        </div>
    ';
    header('Location:../View/Pid.php');
}

