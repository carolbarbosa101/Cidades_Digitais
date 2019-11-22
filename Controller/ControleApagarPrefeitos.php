<?php
session_start();

$cod_prefeito = @$_GET["cod_prefeito"]; // id unico da tabela, chave primaria

if (empty($cod_prefeito)) {
	header('Location:../View/Prefeitos.php');
}

require_once '../Model/ClassPrefeitos.php';
require_once '../Model/DAO/ClassPrefeitosDAO.php';
$apagarPrefeito = new ClassPrefeitosDAO(); // instanciando um objeto
$prefeito = new ClassPrefeitos();
$prefeito->setCod_prefeito($cod_prefeito);

$resultado = $apagarPrefeito->apagarPrefeitos($prefeito); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Prefeitos.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Prefeitos.php');
}