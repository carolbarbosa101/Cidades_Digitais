<?php
session_start();

$cod_telefone = @$_GET["cod_telefone"]; // id unico da tabela, chave primaria

if (empty($cod_telefone)) {
	header('Location:../View/Telefone.php');
}

require_once '../Model/ClassTelefone.php';
require_once '../Model/DAO/ClassTelefoneDAO.php';
$apagarTelefone = new ClassTelefoneDAO(); // instanciando um objeto
$telefone = new ClassTelefone();
$telefone->setCod_telefone($cod_telefone);

$resultado = $apagarTelefone->apagarTelefone($telefone);

if($resultado) {
     $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Telefone.php');
} else {
   $_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Telefone.php');
}