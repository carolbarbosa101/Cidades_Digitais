<?php
session_start();
require_once '../Model/ClassPrefeitos.php';
require_once '../Model/DAO/ClassPrefeitosDAO.php';


$cod_prefeito = @$_POST['cod_prefeito'];
$cod_ibge = @$_POST['cod_ibge'];
$nome = @$_POST['nome'];
$cpf = @$_POST['cpf'];
$rg = @$_POST['rg'];
$partido = @$_POST['partido'];
$exercicio = @$_POST['exercicio'];



$novoPrefeitos = new ClassPrefeitos();
$novoPrefeitos ->setCod_prefeito($cod_prefeito);
$novoPrefeitos->setCod_ibge($cod_ibge);
$novoPrefeitos->setNome($nome);
$novoPrefeitos->setCpf($cpf);
$novoPrefeitos->setRg($rg);
$novoPrefeitos->setPartido($partido);
$novoPrefeitos->setExercicio($exercicio);



$classPrefeitosDAO = new ClassPrefeitosDAO();
$prefeitos = $classPrefeitosDAO->cadastrar($novoPrefeitos);
//var_dump($prefeitos);
//die();
if($prefeitos == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Prefeitos.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$prefeitos.'
        </div>
    ';
    header('Location:../View/Prefeitos.php');
}

