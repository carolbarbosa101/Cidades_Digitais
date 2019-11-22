<?php
session_start();

$cod_ibge = @$_GET["cod_ibge"]; // id unico da tabela, chave primaria

if (empty($cod_ibge)) {
	header('Location:../View/EtapasCd.php');
}

require_once '../Model/ClassEtapas.php';
require_once '../Model/DAO/ClassEtapasDAO.php';
$apagarEtapa = new ClassEtapasDAO(); // instanciando um objeto
$etapa = new ClassEtapas();
$etapa->setCod_ibge($cod_ibge);

$resultado = $apagarEtapa->apagarEtapa($etapa); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/EtapasCd.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/EtapasCd.php');
}