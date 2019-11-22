<?php
session_start();
require_once '../Model/ClassPrefeitos.php';
require_once '../Model/DAO/ClassPrefeitosDAO.php';



$cod_ibge = @$_POST['cod_ibge'];
$nome = @$_POST['nome'];
$cpf = @$_POST['cpf'];
$rg = @$_POST['rg'];
$partido = @$_POST['partido'];
$exercicio = @$_POST['exercicio'];


$novoPrefeito = new ClassPrefeitos();
$novoPrefeito->setCod_ibge($cod_ibge);
$novoPrefeito->setNome($nome);
$novoPrefeito->setCpf($cpf);
$novoPrefeito->setRg($rg);
$novoPrefeito->setPartido($partido);
$novoPrefeito->setExercicio($exercicio);


$classPrefeitoDAO = new ClassPrefeitoDAO();
$prefeito = $classPrefeitoDAO->update($novoPrefeito);

//var_dump($prefeito);
//die();

if($prefeito == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Prefeitos.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$prefeito.'
        </div>
    ';
    header('Location:../View/Prefeitos.php');
}

