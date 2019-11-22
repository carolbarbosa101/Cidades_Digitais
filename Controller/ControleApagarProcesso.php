<?php
session_start();

$cod_processo = @$_GET["cod_processo"]; // id unico da tabela, chave primaria
$cod_ibge = @$_GET["cod_ibge"];

if (empty($cod_processo)) {
	header('Location:../View/Processo.php');
}

require_once '../Model/ClassProcesso.php';
require_once '../Model/DAO/ClassProcessoDAO.php';

$apagarProcesso = new ClassProcessoDAO(); // instanciando um objeto
$processo = new ClassProcesso();

$processo->setCod_processo($cod_processo);
$processo->setCod_ibge($cod_ibge);


$resultado = $apagarProcesso->apagarProcesso($processo); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Processo.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Processo.php');
}