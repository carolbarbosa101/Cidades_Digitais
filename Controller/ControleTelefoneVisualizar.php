<?php

require_once '../Model/ClassTelefone.php';
require_once '../Model/DAO/ClassTelefoneDAO.php';

$cod_telefone = @$_GET['cod_telefone'];

$visualizarTelefone = new ClassTelefone();
$visualizarTelefone->setCod_telefone($cod_telefone);

$ver = new ClassTelefoneDAO(); // instanciando um objeto
$dados = $ver->visualizarTelefone($visualizarTelefone); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum Telefone no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os telefones.
        </div>
    ';
    header('Location:../View/Telefone.php');
}