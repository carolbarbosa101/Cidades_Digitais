<?php
session_start();

$cod_lote = @$_GET["cod_lote"];
$cod_item = @$_GET["cod_item"]; //chaves primarias
$cod_tipo_item = @$_GET["cod_tipo_item"];


if (empty($cod_lote)) {
	header('Location:../View/LoteItens.php');
}

require_once '../Model/ClassLoteItens.php';
require_once '../Model/DAO/ClassLoteItensDAO.php';
$apagarLoteItens = new ClassLoteItensDAO(); // instanciando um objeto
$loteitens = new ClassLoteItens();
$loteitens->setCod_lote($cod_lote);
$loteitens->setCod_item($cod_item);
$loteitens->setCod_tipo_item($cod_tipo_item);
$loteitens->setPreco($preco);

$resultado = $apagarLoteItens->apagarLoteItens($loteitens); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/LoteItens.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/LoteItens.php');
}