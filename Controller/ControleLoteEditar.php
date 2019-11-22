<?php
session_start();
require_once '../Model/ClassLote.php';
require_once '../Model/DAO/ClassLoteDAO.php';


$cod_lote = @$_POST['cod_lote'];
$cnpj = @$_POST['cnpj'];
$contrato = @$_POST['contrato'];
$dt_inicio_vig = @$_POST['dt_inicio_vig'];
$dt_final_vig = @$_POST['dt_final_vig'];
$dt_reajuste = @$_POST['dt_reajuste'].'-0000';


$novoLote = new ClassLote();
$novoLote->setCod_lote($cod_lote);
$novoLote->setCnpj($cnpj);
$novoLote->setContrato($contrato);
$novoLote->setDt_inicio_vig($dt_inicio_vig);
$novoLote->setDt_final_vig($dt_final_vig);
$novoLote->setDt_reajuste(date('Y-m-d', strtotime($dt_reajuste)));


$classLoteDAO = new ClassLoteDAO();
$lote = $classLoteDAO->update($novoLote);

//var_dump($lote);
//die();

if($lote == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Lote.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$lote.'
        </div>
    ';
    header('Location:../View/Lote.php');
}

