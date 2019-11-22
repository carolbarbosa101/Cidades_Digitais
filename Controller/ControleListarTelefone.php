<?php
require_once '../Model/DAO/ClassTelefoneDAO.php';
$listar = new ClassTelefoneDAO();
$dados = $listar->listarTelefone();

if($dados) {
        $array_dados = $dados;
} else {
      $array_dados = [];
}