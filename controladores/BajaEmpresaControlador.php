<?php

class BajaEmpresaControlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function verBaja(){

        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista->render("bajaEmpresa", array());
    }

    public function darBaja(){

        include_once("./lib/GestorSesion.php");
        $sesion = new GestorSesion();
        $cifdni = $sesion->obtenerValorSesion("CLAVE");

        echo $cifdni;

        include_once("./modelos/BajaEmpresaModelo.php");
        $modelo = new BajaEmpresaModelo();
        if($modelo->darBaja($cifdni)){
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