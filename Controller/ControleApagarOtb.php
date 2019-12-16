<?php
session_start();

$cod_otb = @$_GET["cod_otb"]; 

if (empty($cod_otb)) {
	header('Location:../View/Otb.php');
}
require_once '../Model/ClassOtb.php';
require_once '../Model/DAO/ClassOtbDAO.php';
$apagarOtb = new ClassOtbDAO(); 
$otb = new ClassOtb();
$otb->setCod_otb($cod_otb);
$otb->setDt_pgto($dt_pgto);

$resultado = $apagarOtb->apagarOtb($otb);


if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Otb.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Otb.php');
}