<?php

require_once '../Model/ClassTelefone.php';
require_once '../Model/DAO/ClassTelefoneDAO.php';

$cod_telefone = @$_GET['cod_telefone'];
$cod_contato = @$_GET['cod_contato'];
$telefone = @$_GET['telefone'];
$tipo = @$_GET['tipo'];
$contato = @$_GET['contato'];


$visualizarTelefone = new ClassTelefone();
$visualizarTelefone->setCod_telefone($cod_telefone);
$visualizarTelefone->setCod_contato($cod_contato);
//$visualizarTelefone->setTelefone($telefone);
//$visualizarTelefone->setTipo($tipo);

$ver = new ClassTelefoneDAO(); // instanciando um objeto
$dados = $ver->visualizarTelefone($visualizarTelefone); // chamando metodo para listar todos os usuários do banco

//var_dump($visualizarTelefone);
//    die;

if($dados) { // se existir algum Telefone no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os telefones.
        </div>
    ';
    header('Location:../View/Telefone.php');
}