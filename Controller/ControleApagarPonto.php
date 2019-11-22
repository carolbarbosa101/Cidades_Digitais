<?php
session_start();

$cod_ponto = @$_GET["cod_ponto"]; // id unico da tabela, chave primaria

if (empty($cod_ponto)) {
	header('Location:../View/Ponto.php');
}

require_once '../Model/ClassPonto.php';
require_once '../Model/DAO/ClassPontoDAO.php';
$apagarPonto = new ClassPontoDAO(); // instanciando um objeto
$ponto = new ClassPonto();
$ponto->setCod_ponto($cod_ponto);

$resultado = $apagarPonto->apagarPonto($ponto); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum Ponto no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Ponto.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Ponto.php');
}