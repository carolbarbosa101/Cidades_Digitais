<?php
session_start();


// como não tem uma chave primária e só estrangeira, eu fiz um if com todas as estrangeiras
$cod_empenho = @$_GET["cod_empenho"]; 
$cod_empenho = @$_GET['cod_empenho'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];
$cod_previsao_empenho = @$_GET['cod_previsao_empenho'];

if (empty($cod_empenho)) {
    if (empty($cod_empenho)) {
        if (empty($cod_empenho)) {
            if (empty($cod_empenho)) {
                header('Location:../View/ItensEmpenho.php');
            }
        }
    }
}

require_once '../Model/ClassItensEmpenho.php';
require_once '../Model/DAO/ClassItensEmpenhoDAO.php';
$apagarItensEmpenho = new ClassItensEmpenhoDAO(); // instanciando um objeto
$itens_empenho = new ClassItensEmpenho();
$itens_empenho->getCod_empenho($cod_empenho);

$resultado = $apagarItensEmpenho->apagarItensEmpenho($itens_empenho); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir alguma itens_empenho no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/ItensEmpenho.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/ItensEmpenho.php');
}