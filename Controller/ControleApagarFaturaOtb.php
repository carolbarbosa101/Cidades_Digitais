<?php
session_start();

$cod_otb = @$_GET["cod_otb"];
$num_nf = @$_GET["num_nf"];
$cod_ibge = @$_GET["cod_ibge"];
 // id unico da tabela, chave primaria

if (empty($cod_otb)) {
	header('Location:../View/FaturaOtb.php');
}

require_once '../Model/ClassFaturaOtb.php';
require_once '../Model/DAO/ClassFaturaOtbDAO.php';
$apagarFaturaOtb = new ClassFaturaOtbDAO(); // instanciando um objeto
$faturaOtb = new ClassFaturaOtb();

$faturaOtb->setCod_otb($cod_otb);
$faturaOtb->setNum_nf($num_nf);
$faturaOtb->setCod_ibge($cod_ibge);

$resultado = $apagarFaturaOtb->apagarFaturaOtb($faturaOtb); // chamando metodo para listar todos os usuários do banco

//var_dump($fatura);
//die();

if($resultado) { // se existir alguma fatura no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/FaturaOtb.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/FaturaOtb.php');
}