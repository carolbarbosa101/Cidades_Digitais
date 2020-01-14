<?php

require_once '../Model/DAO/ClassItensFaturaDAO.php';
require_once '../Model/DAO/ClassItensEmpenhoDAO.php';

$buscarItensEmpenho = new ClassItensEmpenhoDAO();
$selectItensEmpenho = $buscarItensEmpenho->listarItensEmpenho();
foreach($selectItensEmpenho as $key => $valor) {
    $cod_empenhoE[] = $valor['cod_empenho'];
    $cod_itemE[] = (int)$valor['cod_item'];
    $cod_tipo_itemE[] = (int)$valor['cod_tipo_item'];
    $quantidadeEmpenho[] = (int)$valor['quantidade'];
    $itemLista[] = $valor['itemLista'];
    
}

$buscarItensFatura = new ClassItensFaturaDAO();
$selectItensFatura = $buscarItensFatura->listarItensFatura();
foreach($selectItensFatura as $key => $valor) {
    $cod_empenhoF[] = $valor['cod_empenho'];
    $cod_itemF[] = (int)$valor['cod_item'];
    $cod_tipo_itemF[] = (int)$valor['cod_tipo_item'];
    $quantidadeFatura[] = (int)$valor['quantidade'];
}
// var_dump($cod_empenhoE, $cod_itemE, $cod_tipo_itemE, $quantidadeEmpenho, $itemLista);
// die();

$quantidadeSomaFatura;
$selectAjuda[]=0;
$contador=0;
for($i=0; $i<count($selectItensEmpenho); $i++){
$quantidadeSomaFatura=0;


    for($y=0; $y<count($selectItensFatura); $y++){
        if($cod_empenhoE[$i] == $cod_empenhoF[$y] && $cod_itemE[$i] == $cod_itemF[$y] && $cod_tipo_itemE[$i] == $cod_tipo_itemF[$y]){
            $quantidadeSomaFatura = $quantidadeSomaFatura + $quantidadeFatura[$y];
        }
    }
    $quantidadeAjuda = $quantidadeEmpenho[$i] - $quantidadeSomaFatura;
    if($quantidadeAjuda >0){
        $selectAjuda[$contador]=array($cod_empenhoE[$i], $itemLista[$i], $quantidadeAjuda);
        $contador++;
    }
    $quantidadeAjuda=0;
}

// var_dump($selectAjuda);
// die();

// $buscarAjuda = new ClassItensFaturaDAO(); // instanciando um objeto
// $selectAjuda = $buscarAjuda->todosAjuda(); // chamando metodo para buscar todos os usuários do banco

if($selectAjuda) { // se existir algum municipio no banco então passar o array de selectAjuda para a variavel $array_selectFaturaAjuda
    $array_selectFaturaAjuda = $selectAjuda;
} else {
    // se não receber nenhum dado do banco de selectAjuda, então defirnir um array vazio para variavel $array_selectFaturaAjuda
    $array_selectFaturaAjuda = [];
}