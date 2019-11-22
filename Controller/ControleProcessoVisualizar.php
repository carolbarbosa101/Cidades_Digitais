<?php

require_once '../Model/ClassProcesso.php';
require_once '../Model/DAO/ClassProcessoDAO.php';

$cod_processo = @$_GET['cod_processo'];
$cod_ibge = @$_GET['cod_ibge'];

$visualizarProcesso = new ClassProcesso();
$visualizarProcesso->setCod_processo($cod_processo);

$visualizarProcesso->setCod_ibge($cod_ibge);

$ver = new ClassProcessoDAO(); // instanciando um objeto
$dados = $ver->visualizarProcesso($visualizarProcesso); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum Processo no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar o municipio.
        </div>
    ';
    header('Location:../View/Processo.php');
}