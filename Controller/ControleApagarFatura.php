<?php
session_start();

$num_nf = @$_GET["num_nf"];
$cod_ibge = @$_GET["cod_ibge"];
 // id unico da tabela, chave primaria

if (empty($num_nf)) {
	header('Location:../View/Fatura.php');
}

require_once '../Model/ClassFatura.php';
require_once '../Model/DAO/ClassFaturaDAO.php';
$apagarFatura = new ClassFaturaDAO(); // instanciando um objeto
$fatura = new ClassFatura();

$fatura->setNum_nf($num_nf);
$fatura->setCod_ibge($cod_ibge);

$resultado = $apagarFatura->apagarFatura($fatura); // chamando metodo para listar todos os usuários do banco

//var_dump($fatura);
//die();

if($resultado) { // se existir alguma fatura no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Fatura.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Fatura.php');
}