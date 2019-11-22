<?php

require_once '../Model/ClassEtapas.php';
require_once '../Model/DAO/ClassEtapasDAO.php';

$cod_ibge = @$_GET['cod_ibge'];

$visualizarEtapasCd = new ClassEtapasCd();
$visualizarEtapasCd->setCod_ibge($cod_ibge);

$ver = new ClassEtapasCdDAO(); // instanciando um objeto
$dados = $ver->visualizarEtapasCd($visualizarEtapasCd); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum EtapasCd no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar o EtapasCd.
        </div>
    ';
    header('Location:../View/EtapasCd.php');
}