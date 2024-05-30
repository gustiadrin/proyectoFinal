<?php

class BajaConductorControlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function verBaja(){

        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista->render("bajaConductor", array());
    }

    public function darBaja(){

        include_once("./lib/GestorSesion.php");
        $sesion = new GestorSesion();
        $dni = $sesion->obtenerValorSesion("CLAVE");

        include_once("./modelos/BajaConductorModelo.php");
        $modelo = new BajaConductorModelo();
        if($modelo->darBaja($dni)){
            require_once("./config/Enrutador.php");
            $ruta = new Enrutador();
            header("Location: ".$ruta->getRuta()."index");
        }else{
            $data = $modelo->darBaja($dni);
            if($data["error404"]){
                require_once("./config/Enrutador.php");
                $ruta = new Enrutador();
                header("Location: ".$ruta->getRuta()."error404/verError404");
            }else{
                require_once("./config/Enrutador.php");
                $ruta = new Enrutador();
                header("Location: ".$ruta->getRuta()."error505/verError505");
            }
        }
    }
}

?>