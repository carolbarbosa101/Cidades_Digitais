<?php
session_start();

$cod_ibge = @$_GET["cod_ibge"]; // id unico da tabela, chave primaria

if (empty($cod_ibge)) {
	header('Location:../View/Municipios.php');
}

require_once '../Model/ClassMunicipio.php';
require_once '../Model/DAO/ClassMunicipioDAO.php';
$apagarMunicipio = new ClassMunicipioDAO(); // instanciando um objeto
$municipio = new ClassMunicipio();
$municipio->setCod_ibge($cod_ibge);

$resultado = $apagarMunicipio->apagarMunicipio($municipio); // chamando metodo para listar todos os usuários do banco

if($resultado) { // se existir algum municipio no banco então passar o array de dados para a variavel $array_dados
    $_SESSION['msg'] = '
        <div class="alert alert-success" role="alert">
            Registro apagado com sucesso!
        </div>
    ';
    header('Location:../View/Municipios.php');
} else {
    // se não receber nenhum dado do banco de dados, então definir um array vazio para variavel $array_dados
	$_SESSION['msg'] = '
		<div class="alert alert-danger" role="alert">
			Erro! Não foi possível apagar registro.
		</div>
	';
    header('Location:../View/Municipios.php');
}