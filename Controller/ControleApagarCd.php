<?php
session_start();

$cod_ibge = @$_GET["cod_ibge"]; // id unico da tabela, chave primaria

if (empty($cod_igbe)) {
	header('Location:../View/Cd.php');
}

require_once '../Model/ClassCd.php';
require_once '../Model/DAO/ClassCdDAO.php';
$apagarCd = new ClassCdDAO(); // instanciando um objeto
$cd = new ClassCd();
$cd->setCod_igbe($cod_igbe);

$resultado = $apagarCd->apagarCd($cd); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Cd.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Cd.php');
}