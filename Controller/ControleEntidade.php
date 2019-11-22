<?php
session_start();
require_once '../Model/ClassEntidade.php';
require_once '../Model/DAO/ClassEntidadeDAO.php';


$cnpj = @$_POST['cnpj'];
$nome = @$_POST['nome'];
$endereco = @$_POST['endereco'];
$numero = @$_POST['numero'];
$bairro = @$_POST['bairro'];
$cep = @$_POST['cep'];
$nome_municipio = @$_POST['nome_municipio'];
$uf = @$_POST['uf'];
$observacao = @$_POST['observacao'];


$novoEntidade = new ClassEntidade ();
$novoEntidade->setCnpj($cnpj);
$novoEntidade->setNome($nome);
$novoEntidade->setEndereco($endereco);
$novoEntidade->setNumero($numero);
$novoEntidade->setBairro($bairro);
$novoEntidade->setCep($cep);
$novoEntidade->setNome_municipio($nome_municipio);
$novoEntidade->setUf($uf);
$novoEntidade->setObservacao($observacao);

$classEntidadeDAO = new ClassEntidadeDAO();
$entidade = $classEntidadeDAO->cadastrar($novoEntidade);

//var_dump($entidade);
//die();

if($entidade == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Entidade.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$entidade.'
        </div>
    ';
    header('Location:../View/Entidade.php');
}

