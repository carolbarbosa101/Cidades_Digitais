<?php
session_start();

$cod_empenho = @$_GET["cod_empenho"]; // id unico da tabela, chave primaria

if (empty($cod_empenho)) {
	header('Location:../View/Empenho.php');
}

require_once '../Model/ClassEmpenho.php';
require_once '../Model/DAO/ClassEmpenhoDAO.php';
$apagarEmpenho = new ClassEmpenhoDAO(); // instanciando um objeto
$empenho = new ClassEmpenho();
$empenho->getCod_empenho($cod_empenho);

$resultado = $apagarEmpenho->apagarEmpenho($empenho); // chamando metodo para listar todos os usuários do banco


var_dump($empenho);
die();

if($resultado) { // se existir alguma empenho no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Empenho.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Empenho.php');
}