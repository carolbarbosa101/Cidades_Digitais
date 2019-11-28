<?php
session_start();
require_once '../Model/ClassEmpenho.php';
require_once '../Model/DAO/ClassEmpenhoDAO.php';


$cod_empenho = @$_POST['cod_empenho'];
$cod_previsao_empenho = @$_POST['cod_previsao_empenho'];
$data = @$_POST['data'];
$contador = @$_POST['contador'];


$novoEmpenho = new ClassEmpenho ();
$novoEmpenho->setCod_empenho($cod_empenho);
$novoEmpenho->setCod_previsao_empenho($cod_previsao_empenho);
$novoEmpenho->setData($data);
$novoEmpenho->setContador($contador);


$classEmpenhoDAO = new ClassEmpenhoDAO();
$empenho = $classEmpenhoDAO->update($novaEmpenho);


//var_dump($empenho);
//die();

if($empenho == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/Empenho.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$empenho.'
        </div>
    ';
    header('Location:../View/Empenho.php');
}
