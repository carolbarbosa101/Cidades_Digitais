<?php
session_start();

$cod_otb = @$_GET["cod_otb"];
$num_nf = @$_GET["num_nf"];
$cod_ibge = @$_GET["cod_ibge"];
$cod_empenho = @$_GET["cod_empenho"]; 
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

if (empty($cod_otb)) {
    header('Location:../View/ItensOtb.php');
}

require_once '../Model/ClassItensOtb.php';
require_once '../Model/DAO/ClassItensOtbDAO.php';
$apagarItensOtb = new ClassItensOtbDAO(); // instanciando um objeto
$itens_otb = new ClassItensOtb();
$itens_otb->setCod_otb($cod_otb);
$itens_otb->setNum_nf($num_nf);
$itens_otb->setCod_ibge($cod_ibge);
$itens_otb->setCod_empenho($cod_empenho);
$itens_otb->setCod_item($cod_item);
$itens_otb->setCod_tipo_item($cod_tipo_item);

$resultado = $apagarItensOtb->apagarItensOtb($itens_otb); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir alguma itens_otb no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/ItensOtb.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/ItensOtb.php');
}