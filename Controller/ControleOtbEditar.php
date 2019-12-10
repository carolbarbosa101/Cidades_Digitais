
<?php
session_start();
require_once '../Model/ClassOtb.php';
require_once '../Model/DAO/ClassOtbDAO.php';


$cod_otb = @$_POST['cod_otb'];
$dt_pgto = @$_POST['dt_pgto'];



$novoOtb = new ClassOtb();
$novoOtb->setCod_otb($cod_otb);
$novoOtb->setDt_pgto($dt_pgto);


$classOtbDAO = new ClassOtbDAO();
$otb = $classOtbDAO->update($novoOtb);

//var_dump($otb);
//die();

if($otb == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/Otb.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$otb.'
        </div>
    ';
    header('Location:../View/Otb.php');
}

