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


$novaEntidade = new ClassEntidade();
$novaEntidade->setCnpj($cnpj);
$novaEntidade->setNome($nome);
$novaEntidade->setEndereco($endereco);
$novaEntidade->setNumero($numero);
$novaEntidade->setBairro($bairro);
$novaEntidade->setCep($cep);
$novaEntidade->setNome_municipio($nome_municipio);
$novaEntidade->setUf($uf);
$novaEntidade->setObservacao($observacao);


$classEntidadeDAO = new ClassEntidadeDAO();
$entidade = $classEntidadeDAO->update($novaEntidade);


//var_dump($entidade);
//die();

if($entidade == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
        Editado com sucesso!
        </div>
    ';
    header('Location:../View/Entidade.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
        Erro! Não foi possível atualizar os dados . '.$entidade.'
        </div>
    ';
    header('Location:../View/Entidade.php');
}
