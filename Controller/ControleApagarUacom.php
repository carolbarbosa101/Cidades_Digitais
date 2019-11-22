<?php
session_start();

$cod_ibge = @$_GET["cod_ibge"];
$data = @$_GET["data"];

if (empty($data)) {
	header('Location:../View/Uacom.php');
}

require_once '../Model/ClassUacom.php';
require_once '../Model/DAO/ClassUacomDAO.php';
$apagarUacom = new ClassUacomDAO(); // instanciando um objeto
$uacom = new ClassUacom();
$uacom->setCod_ibge($cod_ibge);
$uacom->setData($data);

$resultado = $apagarUacom->apagarUacom($uacom); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Uacom.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Uacom.php');
}