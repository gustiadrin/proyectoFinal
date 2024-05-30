<?php

    class ListaConductoresControlador{

        public function __construct(Type $var = null) {
            $this->var = $var;
        }

        public function verConductores(){
            include_once("./modelos/ListaConductoresModelo.php");
            $modelo = new ListaConductoresModelo();

            $data = $modelo->listadoConductores();

            include_once("./vistas/Vista.php");
            $vista = new Vista();
            $vista->render("listaConductores", $data);
        }
    }

?>