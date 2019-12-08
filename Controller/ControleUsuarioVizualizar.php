<?php

require_once '../Model/ClassUsuario.php';
require_once '../Model/DAO/ClassUsuarioDAO.php';

$cod_usuario = @$_GET['cod_usuario'];

$visualizarUsuario = new ClassUsuario();
$visualizarUsuario->setCod_usuario($cod_usuario);

$ver = new ClassUsuarioDAO(); // instanciando um objeto
$dados = $ver->visualizarUsuario($visualizarUsuario); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar usuario.
        </div>
    ';
    header('Location:../View/Usuario.php');
}