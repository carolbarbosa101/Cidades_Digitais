<?php
session_start();
require_once '../Model/ClassMunicipio.php';
require_once '../Model/DAO/ClassMunicipioDAO.php';


$cod_ibge = @$_POST['cod_ibge'];
$nome_municipio = @$_POST['nome_municipio'];
$populacao = @$_POST['populacao'];
$uf = @$_POST['uf'];
$regiao = @$_POST['regiao'];
$cnpj = @$_POST['cnpj'];
$dist_capital = @$_POST['dist_capital'];
$endereco = @$_POST['endereco'];
$numero = @$_POST['numero'];
$complemento = @$_POST['complemento'];
$bairro = @$_POST['bairro'];
$idhm = @$_POST['idhm'];
$latitude = @$_POST['latitude'];
$longitude = @$_POST['longitude'];

//var_dump($populacao);
//die();

$novoMunicipio = new ClassMunicipio ();
$novoMunicipio->setCod_ibge($cod_ibge);
$novoMunicipio->setNome_municipio($nome_municipio);
$novoMunicipio->setPopulacao($populacao);
$novoMunicipio->setUf($uf);
$novoMunicipio->setRegiao($regiao);
$novoMunicipio->setCnpj($cnpj);
$novoMunicipio->setDist_capital($dist_capital);
$novoMunicipio->setEndereco($endereco);
$novoMunicipio->setNumero($numero);
$novoMunicipio->setComplemento($complemento);
$novoMunicipio->setBairro($bairro);
$novoMunicipio->setIdhm($idhm);
$novoMunicipio->setLatitude($latitude);
$novoMunicipio->setLongitude($longitude);


//var_dump($novoMunicipio);
//die();


$classMunicipioDAO = new ClassMunicipioDAO();
$municipio = $classMunicipioDAO->cadastrar($novoMunicipio);

//var_dump($municipio);
//die();

if($municipio == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Municipios.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$municipio.'
        </div>
    ';
    header('Location:../View/Municipios.php');
}

