<?php
session_start();

$cod_lote = @$_GET["cod_lote"];

if (empty($cod_lote)) {
    header('Location:../View/Lote.php');
}

require_once '../Model/ClassLote.php';
require_once '../Model/DAO/ClassLoteDAO.php';

$apagarLote = new ClassLoteDAO(); // instanciando um objeto
$lote = new ClassLote();

$lote->setCod_lote($cod_lote);

$resultado = $apagarLote->apagarLote($lote); // chamando metodo para listar todos os usuários do banco
//var_dump($resultado);
//die;

if($resultado) { // se existir alguma entidade no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Lote.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Lote.php');
}