<?php
session_start();

$cod_contato = @$_GET["cod_contato"]; // id unico da tabela, chave primaria

if (empty($cod_contato)) {
	header('Location:../View/Contato.php');
}

require_once '../Model/ClassContato.php';
require_once '../Model/DAO/ClassContatoDAO.php';
$apagarContato = new ClassContatoDAO(); // instanciando um objeto
$contato = new ClassContato();
$contato->setCod_contato($cod_contato);

$resultado = $apagarContato->apagarContato($contato); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum contato no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Contato.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar o registro.
		</div>
	';
    header('Location:../View/Contato.php');
}