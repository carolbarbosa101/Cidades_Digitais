<?php
session_start();

$ano_ref = @$_GET["ano_ref"]; // id unico da tabela, chave primaria
$cod_lote = @$_GET['cod_lote'];

if (empty($cod_ibge)) {
	header('Location:../View/Reajuste.php');
}

require_once '../Model/ClassReajuste.php';
require_once '../Model/DAO/ClassReajusteDAO.php';
$apagarReajuste = new ClassReajusteDAO(); // instanciando um objeto
$reajuste = new ClassReajuste();
$reajuste->setAno_ref($ano_ref);
$reajuste->setCod_lote($cod_lote);

$resultado = $apagarReajuste->apagarReajuste($reajuste); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum reajuste no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Reajuste.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Reajuste.php');
}