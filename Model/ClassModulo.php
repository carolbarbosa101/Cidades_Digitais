<?php
/**
 * Description of ClassMunicipio
 *
 * @author Carol
 */

class ClassMunicipio {
    private $cod_modulo, $categoria_1, $categoria_2, $categoria_3, $descricao;
                  
    function getCod_modulo() {
        return $this->cod_modulo;
    }

    function getCategoria_1() {
        return $this->categoria_1;
    }

    function getCategoria_2() {
        return $this->categoria_2;
    }
    function getCategoria_3() {
        return $this->categoria_3;
    }
    function getDescricao() {
        return $this->descricao;
    }    
    

    function setCod_modulo($cod_modulo) {
        $this->cod_modulo = $cod_modulo;
    }

    function setCategoria_1($categoria_1) {
        $this->categoria_1 = $categoria_1;
    }

    function setCategoria_2($categoria_2) {
        $this->categoria_2 = $categoria_2;
    }
    function setCategoria_3($categoria_3) {
        $this->categoria_3 = $categoria_3;
    }
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    
}
