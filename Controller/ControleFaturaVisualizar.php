<?php

require_once '../Model/ClassFatura.php';
require_once '../Model/DAO/ClassFaturaDAO.php';

$num_nf = @$_GET['num_nf'];
$cod_ibge = @$_GET['cod_ibge'];

$visualizarFatura = new ClassFatura();
$visualizarFatura->setNum_nf($num_nf);
$visualizarFatura->setCod_ibge($cod_ibge);
//var_dump($visualizarFatura);
//    die;
$ver = new ClassFaturaDAO(); // instanciando um objeto
$dados = $ver->visualizarFatura($visualizarFatura); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar a fatura.
        </div>
    ';
    header('Location:../View/Fatura.php');
}