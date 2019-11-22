<?php

require_once '../Model/DAO/ClassMunicipioDAO.php';


$buscarMunicipios = new ClassMunicipioDAO(); // instanciando um objeto
$selectMunicipios = $buscarMunicipios->todosMunicipios(); // chamando metodo para buscar todos os usuários do banco

if($selectMunicipios) { // se existir algum municipio no banco então passar o array de selectMunicipios para a variavel $array_selectMunicipios
    $array_selectMunicipios = $selectMunicipios;
} else {
    // se não receber nenhum dado do banco de selectMunicipios, então definir um array vazio para variavel $array_selectMunicipios
    $array_selectMunicipios = [];
}