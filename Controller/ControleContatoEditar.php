<?php
session_start();
require_once '../Model/ClassContato.php';
require_once '../Model/DAO/ClassContatoDAO.php';



$cod_contato = @$_POST['cod_contato'];
$cnpj = $_POST['cnpj'];
$cod_ibge = $_POST['cod_ibge'];
$nome = @$_POST['nome'];
$email = @$_POST['email'];
$funcao = @$_POST['funcao'];

$novoContato = new ClassContato();
$novoContato->setCod_contato($cod_contato);
$novoContato->setCnpj($cnpj);
$novoContato->setCod_ibge($cod_ibge);
$novoContato->setNome($nome);
$novoContato->setEmail($email);
$novoContato->setFuncao($funcao);



$classContatoDAO = new ClassContatoDAO();
$contato = $classContatoDAO->update($novoContato);

//var_dump($contato);
//die();

if($contato == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Contato.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$contato.'
        </div>
    ';
    header('Location:../View/Contato.php');
}

