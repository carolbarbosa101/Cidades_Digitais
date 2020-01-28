<?php
session_start();

$num_nf = @$_GET["num_nf"];
$cod_ibge = @$_GET["cod_ibge"];
$id_empenho = @$_GET["id_empenho"]; 
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

if (empty($num_nf)) {
    header('Location:../View/ItensFatura.php');
}

require_once '../Model/ClassItensFatura.php';
require_once '../Model/DAO/ClassItensFaturaDAO.php';
$apagarItensFatura = new ClassItensFaturaDAO(); // instanciando um objeto
$itens_fatura = new ClassItensFatura();
$itens_fatura->setNum_nf($num_nf);
$itens_fatura->setCod_ibge($cod_ibge);
$itens_fatura->setId_empenho($id_empenho);
$itens_fatura->setCod_item($cod_item);
$itens_fatura->setCod_tipo_item($cod_tipo_item);

$resultado = $apagarItensFatura->apagarItensFatura($itens_fatura); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir alguma itens_fatura no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/ItensFatura.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/ItensFatura.php');
}