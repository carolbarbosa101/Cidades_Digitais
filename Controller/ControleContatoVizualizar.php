<?php

require_once '../Model/ClassContato.php';
require_once '../Model/DAO/ClassContatoDAO.php';

$cod_contato = @$_GET['cod_contato'];

$visualizarContato = new ClassContato();
$visualizarContato->setCod_contato($cod_contato);

$ver = new ClassContatoDAO(); // instanciando um objeto
$dados = $ver->visualizarContato($visualizarContato); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar contato.
        </div>
    ';
    header('Location:../View/Contato.php');
}