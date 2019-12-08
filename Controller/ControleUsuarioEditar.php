<?php
session_start();
require_once '../Model/ClassUsuario.php';
require_once '../Model/DAO/ClassUsuarioDAO.php';



$cod_usuario = @$_POST['cod_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$status = @$_POST['status'];
$login = @$_POST['login'];
$senha = @$_POST['senha'];

$novoUsuario = new ClassUsuario();
$novoUsuario->setCod_usuario($cod_usuario);
$novoUsuario->setNome($nome);
$novoUsuario->setEmail($email);
$novoUsuario->setStatus($status);
$novoUsuario->setLogin($login);
$novoUsuario->setSenha($senha);



$classUsuarioDAO = new ClassUsuarioDAO();
$usuario = $classUsuarioDAO->update($novoUsuario);

//var_dump($novoUsuario);
//die();

if($usuario == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Usuario.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$usuario.'
        </div>
    ';
    header('Location:../View/Usuario.php');
}

