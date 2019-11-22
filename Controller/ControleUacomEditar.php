
<?php
session_start();
require_once '../Model/ClassUacom.php';
require_once '../Model/DAO/ClassUacomDAO.php';


$cod_ibge = @$_POST['cod_ibge'];
$data = @$_POST['data'];
$titulo = @$_POST['titulo'];
$relato = @$_POST['relato'];



$novoUacom = new ClassUacom();
$novoUacom->setCod_ibge($cod_ibge);
$novoUacom->setData($data);
$novoUacom->setTitulo($titulo);
$novoUacom->setRelato($relato);


$classUacomDAO = new ClassUacomDAO();
$uacom = $classUacomDAO->update($novoUacom);

//var_dump($uacom);
//die();

if($uacom == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Uacom.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$uacom.'
        </div>
    ';
    header('Location:../View/Uacom.php');
}

