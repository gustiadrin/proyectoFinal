<?php

class Seguridad{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function limpiar($cadena){
        return strip_tags($cadena);
    }
}

?>