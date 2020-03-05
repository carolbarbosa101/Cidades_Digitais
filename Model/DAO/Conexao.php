<?php

abstract class Conexao {

    public static function getInstance() {
        $dsn = 'mysql:host=localhost;dbname=cidades_digitais_db;charset=utf8';
        $user = 'root';
        $pass = '';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //setando atributos acessando metodos diretamente usando o ::
            return $pdo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
