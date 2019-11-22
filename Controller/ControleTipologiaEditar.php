
<?php
session_start();
require_once '../Model/ClassTipologia.php';
require_once '../Model/DAO/ClassTipologiaDAO.php';


$cod_tipologia = @$_POST['cod_tipologia'];
$descricao = @$_POST['descricao'];



$novoTipologia = new ClassTipologia();
$novoTipologia->setCod_tipologia($cod_tipologia);
$novoTipologia->setDescricao($descricao);


$classTipologiaDAO = new ClassTipologiaDAO();
$tipologia = $classTipologiaDAO->update($novoTipologia);

//var_dump($tipologia);
//die();

if($tipologia == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Tipologia.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$tipologia.'
        </div>
    ';
    header('Location:../View/Tipologia.php');
}

