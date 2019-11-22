<?php
session_start();

$cod_assunto = @$_GET["cod_assunto"]; // id unico da tabela, chave primaria

if (empty($cod_assunto)) {
	header('Location:../View/Assunto.php');
}

require_once '../Model/ClassAssunto.php';
require_once '../Model/DAO/ClassAssuntoDAO.php';
$apagarAssunto = new ClassAssuntoDAO(); // instanciando um objeto
$assunto = new ClassAssunto();
$assunto->setCod_assunto($cod_assunto);
$assunto->setDescricao($descricao);

$resultado = $apagarAssunto->apagarAssunto($assunto); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Assunto.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Assunto.php');
}