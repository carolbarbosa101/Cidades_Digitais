<?php
session_start();
require_once '../Model/ClassNaturezaDespesa.php';
require_once '../Model/DAO/ClassNaturezaDespesaDAO.php';


$cod_natureza_despesa = @$_POST['cod_natureza_despesa'];
$descricao = @$_POST['descricao'];

$novoNaturezaDespesa = new ClassNaturezaDespesa();
$novoNaturezaDespesa->setCod_natureza_despesa($cod_natureza_despesa);
$novoNaturezaDespesa->setDescricao($descricao);


$ClassNaturezaDespesaDAO = new ClassNaturezaDespesaDAO();
$NaturezaDespesa = $ClassNaturezaDespesaDAO->cadastrar($novoNaturezaDespesa);

//var_dump($NaturezaDespesa);
//die();


if($NaturezaDespesa == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/NaturezaDespesa.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$NaturezaDespesa.'
        </div>
    ';
    header('Location:../View/NaturezaDespesa.php');
}

