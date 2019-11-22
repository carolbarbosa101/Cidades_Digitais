<?php
session_start();

$cnpj = @$_GET["cnpj"]; // id unico da tabela, chave primaria

if (empty($cnpj)) {
	header('Location:../View/Entidade.php');
}

require_once '../Model/ClassEntidade.php';
require_once '../Model/DAO/ClassEntidadeDAO.php';
$apagarEntidade = new ClassEntidadeDAO(); // instanciando um objeto
$entidade = new ClassEntidade();
$entidade->setCnpj($cnpj);

$resultado = $apagarEntidade->apagarEntidade($entidade); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir alguma entidade no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Entidade.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Entidade.php');
}