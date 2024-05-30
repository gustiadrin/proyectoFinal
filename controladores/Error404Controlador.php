<?php

class Error404Controlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function verError404(){
        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista->render("error404", array());
    }
}

?>