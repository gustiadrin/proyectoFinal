<?php

class Vista {

    public function __construct(Type $var = null) {
        $this->var = $var;
    }


    public function render($vista, $data){

        //Obtener ruta de los CSS y JS
        require_once("./config/Enrutador.php");
        $enrutador = new Enrutador();
        $ruta = $enrutador->getRuta();

        require_once("./lib/Seguridad.php");
        $seguro = new Seguridad();

        //este método asociado al objeto Vista, incluye la vista seleccionada
        if (file_exists("./vistas/".$vista.".php")){ 
            require_once ("./vistas/".$vista.".php");
        }
    }
}

?>
