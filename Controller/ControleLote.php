<?php
session_start();
require_once '../Model/ClassLote.php';
require_once '../Model/DAO/ClassLoteDAO.php';


$cod_lote = @$_POST['cod_lote'];
$cnpj = @$_POST['cnpj'];
$contrato = @$_POST['contrato'];
$dt_inicio_vig = @$_POST['dt_inicio_vig'];
$dt_final_vig = @$_POST['dt_final_vig'];
$dt_reajuste = '0000-'.@$_POST['dt_reajuste'];


$novoLote = new ClassLote();
$novoLote->setCod_lote($cod_lote);
$novoLote->setCnpj($cnpj);
$novoLote->setContrato($contrato);
$novoLote->setDt_inicio_vig($dt_inicio_vig);
$novoLote->setDt_final_vig($dt_final_vig);
$novoLote->setDt_reajuste($dt_reajuste);

$classLoteDAO = new ClassLoteDAO();
$lote = $classLoteDAO->cadastrar($novoLote);
//var_dump($lote);
//die();
if($lote == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/Lote.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$lote.'
        </div>
    ';
    header('Location:../View/Lote.php');
}

