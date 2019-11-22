<?php

require_once '../Model/ClassEntidade.php';
require_once '../Model/DAO/ClassEntidadeDAO.php';

$cnpj = @$_GET['cnpj'];

$visualizarEntidade = new ClassEntidade();
$visualizarEntidade->setCnpj($cnpj);

$ver = new ClassEntidadeDAO(); // instanciando um objeto
$dados = $ver->visualizarEntidade($visualizarEntidade); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar a entidade.
        </div>
    ';
    header('Location:../View/Entidade.php');
}