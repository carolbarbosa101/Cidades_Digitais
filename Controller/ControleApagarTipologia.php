<?php
session_start();

$cod_tipologia = @$_GET["cod_tipologia"]; // id unico da tabela, chave primaria

if (empty($cod_tipologia)) {
	header('Location:../View/Tipologia.php');
}

require_once '../Model/ClassTipologia.php';
require_once '../Model/DAO/ClassTipologiaDAO.php';
$apagarTipologia = new ClassTipologiaDAO(); // instanciando um objeto
$tipologia = new ClassTipologia();
$tipologia->setCod_tipologia($cod_tipologia);
$tipologia->setDescricao($descricao);

$resultado = $apagarTipologia->apagarTipologia($tipologia); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Tipologia.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Tipologia.php');
}