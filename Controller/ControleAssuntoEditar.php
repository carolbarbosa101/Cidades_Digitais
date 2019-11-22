
<?php
session_start();
require_once '../Model/ClassAssunto.php';
require_once '../Model/DAO/ClassAssuntoDAO.php';


$cod_assunto = @$_POST['cod_assunto'];
$descricao = @$_POST['descricao'];



$novoAssunto = new ClassAssunto();
$novoAssunto->setCod_assunto($cod_assunto);
$novoAssunto->setDescricao($descricao);


$classAssuntoDAO = new ClassAssuntoDAO();
$assunto = $classAssuntoDAO->update($novoAssunto);

//var_dump($assunto);
//die();

if($assunto == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Assunto.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$assunto.'
        </div>
    ';
    header('Location:../View/Assunto.php');
}

