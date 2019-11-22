<?php

require_once '../Model/ClassAssunto.php';
require_once '../Model/DAO/ClassAssuntoDAO.php';

$cod_assunto = @$_GET['cod_assunto'];

$visualizarAssunto = new ClassAssunto();
$visualizarAssunto->setCod_assunto($cod_assunto);

$ver = new ClassAssuntoDAO();
$dados = $ver->visualizarAssunto($visualizarAssunto);

if($dados) { 
    $array_dados = $dados[0];
    
   
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/Assunto.php');
}