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
$empenho = $classEmpenhoDAO->cadastrar($novoEmpenho);

//var_dump($empenho);
//die();

if($empenho == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Empenho.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$empenho.'
        </div>
    ';
    header('Location:../View/Empenho.php');
}

