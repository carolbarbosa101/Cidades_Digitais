<?php
session_start();

$cod_ponto = @$_GET["cod_ponto"];
$cod_categoria = @$_GET["cod_categoria"];
$cod_ibge = @$_GET["cod_ibge"];
$cod_pid = @$_GET["cod_pid"]; 



$cod_pid = @$_GET["cod_pid"]; 




if (empty($cod_pid)) {
	header('Location:../View/Pid.php');
}


require_once '../Model/ClassPid.php';
require_once '../Model/DAO/ClassPidDAO.php';
require_once '../Model/ClassPonto.php';
require_once '../Model/DAO/ClassPontoDAO.php';

$apagarPonto= new ClassPontoDAO();
$ponto = new ClassPonto();
$ponto->setCod_ponto($cod_ponto);
$ponto->setCod_categoria($cod_categoria);
$ponto->setCod_ibge($cod_ibge);
$ponto->setCod_pid($cod_pid);

$apagarPid = new ClassPidDAO();
$pid = new ClassPid();
$pid->setCod_pid($cod_pid);


$resultado = $apagarPonto->apagarPonto($ponto);
 
$resultado = $apagarPid->apagarPid($pid); 

if($resultado) { 
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Pid.php');
} else {
  
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Pid.php');
}