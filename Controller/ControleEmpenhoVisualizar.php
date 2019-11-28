<?php

require_once '../Model/ClassEmpenho.php';
require_once '../Model/DAO/ClassEmpenho.php';

$cod_empenho = @$_POST['cod_empenho'];

$visualizarEmpenho = new ClassEmpenho();
$visualizarEmpenho->setNum_nf($num_nf);

$ver = new ClassEmpenhoDAO(); // instanciando um objeto
$dados = $ver->visualizarEmpenho($visualizarEmpenho); // chamando metodo para listar todos os usuários do banco

if($dados) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $array_dados = $dados[0];
    
    //var_dump($array_dados);
    //die;
} else {
    $_SESSION['msg'] = '
        <div class="alert alert-danger" role="alert">
            Erro! Não foi possível visualizar a empenho.
        </div>
    ';
    header('Location:../View/Empenho.php');
}