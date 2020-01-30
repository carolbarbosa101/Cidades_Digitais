<?php

require_once '../Model/ClassItensOtb.php';
require_once '../Model/DAO/ClassItensOtbDAO.php';

$cod_otb = @$_GET['cod_otb'];
$num_nf = @$_GET['num_nf'];
$cod_ibge = @$_GET['cod_ibge'];
$id_empenho = @$_GET['id_empenho'];
$cod_item = @$_GET['cod_item'];
$cod_tipo_item = @$_GET['cod_tipo_item'];

$visualizarItensOtb = new ClassItensOtb();
$visualizarItensOtb->setCod_otb($cod_otb);
$visualizarItensOtb->setNum_nf($num_nf);
$visualizarItensOtb->setCod_ibge($cod_ibge);
$visualizarItensOtb->setId_empenho($id_empenho);
$visualizarItensOtb->setCod_item($cod_item);
$visualizarItensOtb->setCod_tipo_item($cod_tipo_item);

$ver = new ClassItensOtbDAO(); // instanciando um objeto
$dados = $ver->visualizarItensOtb($visualizarItensOtb); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar a itens_empenho.
        </div>
    ';
    header('Location:../View/ItensOtb.php');
}