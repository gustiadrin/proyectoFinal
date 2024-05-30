<?php

class ActualizarConductorControlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }


    public function verActualizar(){
        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista->render("actualizarConductor",array());
    }

    public function actualizarConductor(){

        require_once("./lib/GestorSesion.php");
        $sesion = new GestorSesion();
        $dni = $sesion->obtenerValorSesion("CLAVE");

        require_once("./lib/Seguridad.php");
        $seguro = new Seguridad();

        if(empty($_POST["dni"]) || $dni != $_POST["dni"]){
            $data["errorLogin"]="El dni no coincide o está vacío";
            require_once("./vistas/Vista.php");
            $vista = new Vista();
            $vista->render("actualizarConductor",$data);
        }

        if(!empty($_POST["nombre"])){
            $nombre=$seguro->limpiar($_POST["nombre"]);
        }else{
            $nombre="";
        }

        if(!empty($_POST["telefono"])){
            $telefono = $seguro->limpiar($_POST["telefono"]);
        }else{
            $telefono="";
        }

        if(!empty($_POST["ciudad"])){
            $ciudad = $seguro->limpiar($_POST["ciudad"]);
        }else{
            $ciudad="";
        }

        if(isset($_POST["disponibilidad"]) && $_POST["disponibilidad"]="on"){
            $disponible=1;
        }else{
            $disponible=0;
        }

        if(!empty($_POST["presentacion"])){
            $presentacion = $seguro->limpiar($_POST["presentacion"]);
        }else{
            $presentacion="";
        }

        include_once("./modelos/ActualizarConductorModelo.php");
        $modelo = new ActualizarConductorModelo();
        if($modelo->actulizarConductor($dni, $nombre, $telefono, $ciudad, $disponible, $presentacion)){
            require_once("./config/Enrutador.php");
            $ruta = new Enrutador();
            header("Location: ".$ruta->getRuta()."perfilConductor/verPerfilConductor");
        }else{
            require_once("./config/Enrutador.php");
            $ruta = new Enrutador();
            header("Location: ".$ruta->getRuta()."error505/verError505");
        }      

    }

}

?>