<?php

require_once '../Model/ClassPonto.php';
require_once '../Model/DAO/ClassPontoDAO.php';

$cod_ponto = @$_GET['cod_ponto'];
$cod_ibge = @$_GET['cod_ibge'];
$cod_categoria = @$_GET['cod_categoria'];
$cod_pid = @$_GET['cod_pid'];



$visualizarPonto = new ClassPonto();
$visualizarPonto->setCod_ponto($cod_ponto);
$visualizarPonto->setCod_ibge($cod_ibge);
$visualizarPonto->setCod_categoria($cod_categoria);
$visualizarPonto->setCod_pid($cod_pid);


//var_dump($visualizarPonto);
//die();

$ver = new ClassPontoDAO(); // instanciando um objeto
$dados = $ver->visualizarPonto($visualizarPonto); // chamando metodo para listar todos os usuários do banco
  

if($dados) { // se existir algum Ponto no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
  
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar o ponto.
        </div>
    ';
    
    header('Location:../View/Ponto.php');
}