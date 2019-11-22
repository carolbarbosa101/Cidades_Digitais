<?php

require_once '../Model/ClassReajuste.php';
require_once '../Model/DAO/ClassReajusteDAO.php';

$ano_ref = @$_GET['ano_ref'];
$cod_lote = @$_GET['cod_lote'];

$visualizarReajuste = new ClassReajuste();
$visualizarReajuste->setAno_ref($ano_ref);
$visualizarReajuste->setCod_lote($cod_lote);

$ver = new ClassReajusteDAO(); // instanciando um objeto
$dados = $ver->visualizarReajuste($visualizarReajuste); // chamando metodo para listar todos os usuários do banco


  
//var_dump($dados);
//die;

if($dados) { // se existir algum Reajuste no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
  
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar reajustes.
        </div>
    ';
    header('Location:../View/Reajuste.php');
}