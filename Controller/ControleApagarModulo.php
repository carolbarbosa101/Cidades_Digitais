<?php
session_start();

$cod_modulo = @$_GET["cod_modulo"]; // id unico da tabela, chave primaria

if (empty($cod_modulo)) {
	header('Location:../View/Modulo.php');
}

require_once '../Model/ClassModulo.php';
require_once '../Model/DAO/ClassModuloDAO.php';
$apagarModulo = new ClassModuloDAO(); // instanciando um objeto
$modulo = new ClassModulo();
$modulo->setCod_modulo($cod_modulo);

$resultado = $apagarModulo->apagarModulo($modulo); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Modulo.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Modulo.php');
}