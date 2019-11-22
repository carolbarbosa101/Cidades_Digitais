<?php

require_once '../Model/ClassMunicipio.php';
require_once '../Model/DAO/ClassMunicipioDAO.php';

$cod_ibge = @$_GET['cod_ibge'];

$visualizarMunicipio = new ClassMunicipio();
$visualizarMunicipio->setCod_ibge($cod_ibge);

$ver = new ClassMunicipioDAO(); // instanciando um objeto
$dados = $ver->visualizarMunicipio($visualizarMunicipio); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar o municipio.
        </div>
    ';
    header('Location:../View/Municipios.php');
}