<?php

require_once '../Model/ClassPid.php';
require_once '../Model/DAO/ClassPidDAO.php';


$cod_pid = @$_GET['cod_pid'];

$visualizarPid = new ClassPid();
$visualizarPid->setCod_pid($cod_pid);

$ver = new ClassPidDAO(); 
$dados = $ver->visualizarPid($visualizarPid); 

if($dados) {
    $array_dados = $dados[0];
    
  //  var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = 'uiop op0
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar o Pid.
        </div>
    ';
    header('Location:../View/Pid.php');
}