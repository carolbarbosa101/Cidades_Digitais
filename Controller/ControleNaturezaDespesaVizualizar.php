<?php

require_once '../Model/ClassNaturezaDespesa.php';
require_once '../Model/DAO/ClassNaturezaDespesaDAO.php';

$cod_natureza_despesa = @$_GET['cod_natureza_despesa'];

$visualizarNaturezaDespesa = new ClassNaturezaDespesa();
$visualizarNaturezaDespesa->setCod_natureza_despesa($cod_natureza_despesa);

$ver = new ClassNaturezaDespesaDAO();
$dados = $ver->visualizarNaturezaDespesa($visualizarNaturezaDespesa);

if($dados) { 
    $array_dados = $dados[0];
    
   
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar os dados.
        </div>
    ';
    header('Location:../View/NaturezaDespesa.php');
}