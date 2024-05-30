<?php

class ActualizarEmpresaControlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }


    public function verActualizar(){
        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista->render("actualizarEmpresa",array());
    }

    public function actualizarEmpresa(){


        require_once("./lib/GestorSesion.php");
        $sesion = new GestorSesion();
        $cifdni = $sesion->obtenerValorSesion("CLAVE");

        require_once("./lib/Seguridad.php");
        $seguro = new Seguridad();

        if(empty($_POST["cifdni"]) || $cifdni != $_POST["cifdni"]){
            $data["errorLogin"]="El dni no coincide o está vacío";
            require_once("./vistas/Vista.php");
            $vista = new Vista();
            $vista->render("actualizarEmpresa",$data);
        }

        if(!empty($_POST["nombre"])){
            $nombreemp=$seguro->limpiar($_POST["nombre"]);
        }else{
            $nombreemp="";
        }

        if(!empty($_POST["descripcion"])){
            $descripcion=$seguro->limpiar($_POST["descripcion"]);
        }else{
            $descripcion="";
        }

        if(!empty($_POST["telefono"])){
            $telefono=$seguro->limpiar($_POST["telefono"]);
        }else{
            $telefono="";
        }

        if(!empty($_POST["email"])){
            $email=$seguro->limpiar($_POST["email"]);
        }else{
            $email="";
        }

        if(!empty($_POST["ciudad"])){
            $ciudad=$seguro->limpiar($_POST["ciudad"]);
        }else{
            $ciudad="";
        }

        if(!empty($_POST["n_vehiculos"])){
            $n_vehiculos=$seguro->limpiar($_POST["n_vehiculos"]);
        }else{
            $n_vehiculos="";
        }

        if(!empty($_POST["v_disponibles"])){
            $v_disponibles=$seguro->limpiar($_POST["v_disponibles"]);
        }else{
            $v_disponibles="";
        }

        include_once("./modelos/ActualizarEmpresaModelo.php");
        $modelo = new ActualizarEmpresaModelo();
        if($modelo->actualizarEmpresa($cifdni, $nombreemp, $descripcion, $telefono, $email, $ciudad, $n_vehiculos, $v_disponibles)){
            require_once("./config/Enrutador.php");
            $ruta = new Enrutador();
            header("Location: ".$ruta->getRuta()."perfilEmpresa/verPerfilEmpresa");
        }else{
            require_once("./config/Enrutador.php");
            $ruta = new Enrutador();
            header("Location: ".$ruta->getRuta()."error505/verError505");
        }

        

    }

}

?>