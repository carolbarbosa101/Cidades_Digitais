<?php
session_start();
require_once '../Model/ClassItensFatura.php';
require_once '../Model/DAO/ClassItensFaturaDAO.php';


$num_nf = @$_POST['num_nf'];
$cod_ibge = @$_POST['cod_ibge'];
$id_empenho = @$_POST['id_empenho'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$valor = @$_POST['valor'];
$quantidade = @$_POST['quantidade'];


$novoItensFatura = new ClassItensFatura ();
$novoItensFatura->setNum_nf($num_nf);
$novoItensFatura->setCod_ibge($cod_ibge);
$novoItensFatura->setId_empenho($id_empenho);
$novoItensFatura->setCod_item($cod_item);
$novoItensFatura->setCod_tipo_item($cod_tipo_item);
$novoItensFatura->setValor($valor);
$novoItensFatura->setQuantidade($quantidade);

//var_dump($novoItensFatura);
//die();

$classItensFaturaDAO = new ClassItensFaturaDAO();
$itens_fatura = $classItensFaturaDAO->update($novoItensFatura);


//var_dump($itens_fatura);
//die();

if($itens_fatura == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/ItensFatura.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$itens_fatura.'
        </div>
    ';
    header('Location:../View/ItensFatura.php');
}
