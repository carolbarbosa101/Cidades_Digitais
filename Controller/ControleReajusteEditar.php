<?php
session_start();
require_once '../Model/ClassReajuste.php';
require_once '../Model/DAO/ClassReajusteDAO.php';


$ano_ref = @$_POST['ano_ref'];
$cod_lote = @$_POST['cod_lote'];
$percentual = @$_POST['percentual'];

$novoReajuste = new ClassReajuste ();
$novoReajuste->setAno_ref($ano_ref);
$novoReajuste->setCod_lote($cod_lote);
$novoReajuste->setPercentual($percentual);


$classReajusteDAO = new ClassReajusteDAO();
$reajuste = $classReajusteDAO->update($novoReajuste);

//var_dump($reajuste);
//die();

if($reajuste == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Reajuste.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$reajuste.'
        </div>
    ';
    header('Location:../View/Reajuste.php');
}

