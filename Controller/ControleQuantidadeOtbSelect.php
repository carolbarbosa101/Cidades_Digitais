<?php

require_once '../Model/DAO/ClassItensFaturaDAO.php';
require_once '../Model/DAO/ClassItensOtbDAO.php';

$buscarItensOtb = new ClassItensOtbDAO();
$selectItensOtb = $buscarItensOtb->listarItensOtb();
foreach($selectItensOtb as $key => $valor) {
    $num_nfO[] = $valor['num_nf'];
    $cod_ibgeO[] = $valor['cod_ibge'];
    $cod_empenhoO[] = $valor['cod_empenho'];
    $cod_itemO[] = (int)$valor['cod_item'];
    $cod_tipo_itemO[] = (int)$valor['cod_tipo_item'];
    $quantidadeOtb[] = (int)$valor['quantidade'];
    
    
}

$buscarItensFatura = new ClassItensFaturaDAO();
$selectItensFatura = $buscarItensFatura->listarItensFatura();
foreach($selectItensFatura as $key => $valor) {
    $num_nfF[] = $valor['num_nf'];
    $cod_ibgeF[] = $valor['cod_ibge'];
    $municipioIbge[] = $valor['municipioIbge'];
    $cod_empenhoF[] = $valor['cod_empenho'];
    $cod_itemF[] = (int)$valor['cod_item'];
    $cod_tipo_itemF[] = (int)$valor['cod_tipo_item'];
    $quantidadeFatura[] = (int)$valor['quantidade'];
    $itemLista[] = $valor['descricaoItem'];
}
// var_dump($cod_empenhoE, $cod_itemE, $cod_tipo_itemE, $quantidadeEmpenho, $itemLista);
// die();

$quantidadeSomaOtb;
$selectAjuda[]=0;
$contador=0;
for($i=0; $i<count($selectItensFatura); $i++){
$quantidadeSomaOtb=0;


    for($y=0; $y<count($selectItensOtb); $y++){
        if($num_nfF[$i] == $num_nfO[$y] && $cod_ibgeF[$i] == $cod_ibgeO[$y] && $cod_empenhoF[$i] == $cod_empenhoO[$y] && $cod_itemF[$i] == $cod_itemO[$y] && $cod_tipo_itemF[$i] == $cod_tipo_itemO[$y]){
            $quantidadeSomaOtb = $quantidadeSomaOtb + $quantidadeFatura[$y];
        }
    }
    $quantidadeAjuda = $quantidadeFatura[$i] - $quantidadeSomaOtb;
    if($quantidadeAjuda >0){
        $selectAjuda[$contador]=array($num_nfF[$i], $municipioIbge[$i], $cod_empenhoF[$i], $itemLista[$i], $quantidadeAjuda);
        $contador++;
    }
    $quantidadeAjuda=0;
}

// var_dump($selectAjuda);
// die();

// $buscarAjuda = new ClassItensFaturaDAO(); // instanciando um objeto
// $selectAjuda = $buscarAjuda->todosAjuda(); // chamando metodo para buscar todos os usuários do banco

if($selectAjuda) { // se existir algum municipio no banco então passar o array de selectAjuda para a variavel $array_selectAjuda
    $array_selectOtbAjuda = $selectAjuda;
} else {
    // se não receber nenhum dado do banco de selectAjuda, então defirnir um array vazio para variavel $array_selectOtbAjuda
    $array_selectOtbAjuda = [];
}