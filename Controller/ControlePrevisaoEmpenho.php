<?php
session_start();
require_once("../Controller/ControleListarPrevisaoEmpenho.php");
require_once '../Model/ClassPrevisaoEmpenho.php';
require_once '../Model/DAO/ClassPrevisaoEmpenhoDAO.php';
require_once '../Model/DAO/ClassItensPrevisaoEmpenhoDAO.php';
require_once '../Model/DAO/ClassReajusteDAO.php';
require_once '../Model/DAO/ClassLoteItensDAO.php';

$cod_previsao_empenho = @$_POST['cod_previsao_empenho'];
$cod_lote = @$_POST['cod_lote'];
$cod_natureza_despesa = @$_POST['cod_natureza_despesa'];
$data = @$_POST['data'];
$tipo = @$_POST['tipo'];
$ano_referencia = @$_POST['ano_referencia'];

$novoPrevisaoEmpenho = new ClassPrevisaoEmpenho ();
$novoPrevisaoEmpenho->setCod_previsao_empenho($cod_previsao_empenho);
$novoPrevisaoEmpenho->setCod_lote($cod_lote);
$novoPrevisaoEmpenho->setCod_natureza_despesa($cod_natureza_despesa);
$novoPrevisaoEmpenho->setData($data);
$novoPrevisaoEmpenho->setTipo($tipo);
$novoPrevisaoEmpenho->setAno_referencia($ano_referencia);

//var_dump($novoPrevisaoEmpenho);
//die();

$classPrevisaoEmpenhoDAO = new ClassPrevisaoEmpenhoDAO();
$previsao_empenho = $classPrevisaoEmpenhoDAO->cadastrar($novoPrevisaoEmpenho);

if($tipo=="O"){
    
    foreach($array_dados as $key => $value) {
        $cod_previsao_empenho = (int) $value['cod_previsao_empenho']+1;
    }

    $buscarPreco = new ClassLoteItensDAO();
    $selectPreco = $buscarPreco->listarPreco($cod_previsao_empenho);
    foreach($selectPreco as $key => $valor) {
        $cod_lote = $valor['cod_lote'];
    }

    $buscarReajuste = new ClassReajusteDAO();
    $selectPercentual = $buscarReajuste->listarPercentual($ano_referencia, $cod_lote);
    foreach($selectPercentual as $key => $valor) {
        $percentual[] =(float)$valor['percentual'];
    }

    $Reajuste = new ClassReajusteDAO();
    $selectContador = $Reajuste->contador($ano_referencia);
    foreach($selectContador as $key => $value) {
        $contador = (int) $value['contador'];
    }

    $reajuste = 1;

    for ($i=0; $i < $contador; $i++){
        $reajuste = $reajuste * ($percentual[$i]/100 +1);
    }
    
    $buscarItensPrevisaoEmpenho = new ClassItensPrevisaoEmpenhoDAO();
    $selectNumero = $buscarItensPrevisaoEmpenho->listarNumero($cod_previsao_empenho);
    foreach($selectNumero as $key => $value) {
        $numero = (int) $value['numero'];
    }
    
    $buscarPreco = new ClassLoteItensDAO();
    $selectPreco = $buscarPreco->listarPreco($cod_previsao_empenho);
    foreach($selectPreco as $key => $valor) {
        $cod_previsao_empenho = $valor['cod_previsao_empenho'];
        $cod_item[] = (int)$valor['cod_item'];
        $cod_tipo_item[] = (int)$valor['cod_tipo_item'];
        $preco[] =(float)$valor['preco'];
    }

    for ($i = 0; $i<$numero; $i++){
        $preco[$i] = $preco[$i] * $reajuste;
    }
    //$array = array();
    for($y=0; $y<$numero; $y++){
        //$array[$y] = array("cod_previsao_empenho"=>$cod_previsao_empenho, "cod_item"=>$cod_item[$y], "cod_tipo_item"=>$cod_tipo_item[$y], "preco"=>$preco[$y]);
        $selectNewUpdate = $buscarItensPrevisaoEmpenho->updateNew($preco[$y], $cod_previsao_empenho, $cod_item[$y], $cod_tipo_item[$y]);
    }
    
    // chama o update que vai atualizar os 32 valores 
    // pra cada update passa {valor, cod_previsao_empenho, cod_item, cod_tipo_item }

}


if($previsao_empenho == TRUE){
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
    ';
    header('Location:../View/PrevisaoEmpenho.php');
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Cadastro não realizado . '.$previsao_empenho.'
        </div>
    ';
    header('Location:../View/PrevisaoEmpenho.php');
}

