<?php
/**
 * Description of ClassUsuario
 * @author Carol
 */

class ClassUsuario {
    private $cod_usuario, $nome, $email, $status, $login, $senha;
                  
    function getCod_usuario() {
        return $this->cod_usuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }
    function getStatus() {
        return $this->status;
    }
    function getLogin() {
        return $this->login;
    }
    function getSenha() {
        return $this->senha;
    }   
    

    function setCod_usuario($cod_usuario) {
        $this->cod_usuario = $cod_usuario;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setStatus($status) {
        $this->status = $status;
    }
    function setLogin($login) {
        $this->login = $login;
    }
	function setSenha($senha) {
        $this->senha = $senha;
    }
}
