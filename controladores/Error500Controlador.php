<?php

class Error500Controlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function verError500(){
        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista->render("error500", array());
    }
}

?>