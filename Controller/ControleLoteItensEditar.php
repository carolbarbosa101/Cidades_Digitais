
<?php
session_start();
require_once '../Model/ClassLoteItens.php';
require_once '../Model/DAO/ClassLoteItensDAO.php';


$cod_lote = @$_POST['cod_lote'];
$cod_item = @$_POST['cod_item'];
$cod_tipo_item = @$_POST['cod_tipo_item'];
$preco = @$_POST['preco'];


$novoLoteItens = new ClassLoteItens();
$novoLoteItens->setCod_lote($cod_lote);
$novoLoteItens->setCod_item($cod_item);
$novoLoteItens->setCod_tipo_item($cod_tipo_item);
$novoLoteItens->setPreco($preco);



$classLoteItensDAO = new ClassLoteItensDAO();
$loteitens = $classLoteItensDAO->update($novoLoteItens);

//var_dump($loteitens);
//die();

if($loteitens == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Editado com sucesso!
        </div>
    ';
    header('Location:../View/LoteItens.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível atualizar os dados . '.$loteitens.'
        </div>
    ';
    header('Location:../View/LoteItens.php');
}

