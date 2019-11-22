<?php

require_once '../Model/ClassLote.php';
require_once '../Model/DAO/ClassLoteDAO.php';

$cod_lote = @$_GET['cod_lote'];

$visualizarLote = new ClassLote();
$visualizarLote->setCod_lote($cod_lote);

$ver = new ClassLoteDAO(); // instanciando um objeto
$dados = $ver->visualizarLote($visualizarLote); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum lote no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar lote.
        </div>
    ';
    header('Location:../View/Lote.php');
}