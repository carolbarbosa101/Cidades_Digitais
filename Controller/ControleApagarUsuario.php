<?php
session_start();

$cod_usuario = @$_GET["cod_usuario"]; // id unico da tabela, chave primaria

if (empty($cod_usuario)) {
	header('Location:../View/Usuario.php');
}

require_once '../Model/ClassUsuario.php';
require_once '../Model/DAO/ClassUsuarioDAO.php';
$apagarUsuario = new ClassUsuarioDAO(); // instanciando um objeto
$usuario = new ClassUsuario();
$usuario->setCod_usuario($cod_usuario);

$resultado = $apagarUsuario->apagarUsuario($usuario); // chamando metodo para listar todos os usuários do banco
//var_dump($resultado);
//die;
if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Usuario.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Usuario.php');
}