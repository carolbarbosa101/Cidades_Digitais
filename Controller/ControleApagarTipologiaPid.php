<?php
session_start();

$cod_pid = @$_GET["cod_pid"];
$cod_tipologia = @$_GET["cod_tipologia"];

if (empty($cod_tipologia)) {
	header('Location:../View/TipologiaPid.php');
}

require_once '../Model/ClassTipologiaPid.php';
require_once '../Model/DAO/ClassTipologiaPidDAO.php';
$apagarTipologiaPid = new ClassTipologiaPidDAO();
$tipologiapid = new ClassTipologiaPid();
$tipologiapid->setCod_pid($cod_pid);
$tipologiapid->setCod_tipologia($cod_tipologia);


$resultado = $apagarTipologiaPid->apagarTipologiaPid($tipologiapid);

if($resultado) {
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/TipologiaPid.php');
} else {
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/TipologiaPid.php');
}