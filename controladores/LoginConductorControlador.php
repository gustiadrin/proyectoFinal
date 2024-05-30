<?php

class LoginConductorControlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function verLogin(){
        //Esta acción deberá:
        //Acceder al modelo
 
        //Acceder a la vista
        require_once("./vistas/Vista.php");
        $vista = new Vista();
        $vista->render("loginConductor",array());
        
     }
    
     public function logearse(){

        if((isset($_POST["dni"]) && isset($_POST["contrasena"])) || (!empty($_POST["dni"]) && !empty($_POST["contrasena"]))){
           
            require_once("./lib/Seguridad.php");
            $seguro = new Seguridad();
            
            $dni = $seguro->limpiar($_POST["dni"]);
            $contrasena = $seguro->limpiar($_POST["contrasena"]);

            require_once("./modelos/LoginConductorModelo.php");
            $modelo = new LoginConductorModelo();

            if($modelo->validar($dni, $contrasena)){
                //Esto crea la sesión
                require_once("./lib/GestorSesion.php");
                $sesion = new GestorSesion();
                $sesion->crearSesion("CLAVE", $dni);
                
                require_once("./config/Enrutador.php");
                $ruta = new Enrutador();
                header("Location: ".$ruta->getRuta()."perfilConductor/verPerfilConductor");
            }else{
                $data["errorLogin"]="Error en usuario o contraseña, vuelva a intentarlo";
                require_once("./vistas/Vista.php");
                $vista = new Vista();
                $vista->render("loginConductor",$data);
            }
        }
     }
}

?>