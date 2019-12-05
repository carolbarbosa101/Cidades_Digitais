<?php

require_once '../Model/ClassPrefeitos.php';
require_once '../Model/DAO/ClassPrefeitosDAO.php';

$cod_prefeito = @$_GET['cod_prefeito'];
$cod_ibge = @$_GET['cod_ibge'];

$visualizarPrefeitos = new ClassPrefeitos();
$visualizarPrefeitos->setCod_prefeito($cod_prefeito);
$visualizarPrefeitos->setCod_ibge($cod_ibge);

$ver = new ClassPrefeitosDAO(); // instanciando um objeto
$dados = $ver->visualizarPrefeitos($visualizarPrefeitos); // chamando metodo para listar todos os usuários do banco
  
//var_dump($visualizarPrefeitos);
//    die;

if($dados) { // se existir algum Prefeitos no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar prefeitos.
        </div>
    ';
    header('Location:../View/Prefeitos.php');
}