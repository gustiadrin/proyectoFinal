<?php

class LoginEmpresaControlador{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    //Primero definimos las acciones que hará el controlador
    //Acción 1:
    public function verLogin(){
       //Esta acción deberá:
       //Acceder al modelo

        include_once("./vistas/Vista.php");
        $vista = new Vista();

        $vista-> render("loginEmpresa", array());

       //Acceder a la vista
    }

    public function logearse(){
        if((isset($_POST["cifdni"]) && isset($_POST["pass"])) || (!empty($_POST["cifdni"]) && !empty($_POST["pass"]))){

            require_once("./lib/Seguridad.php");
            $seguro = new Seguridad();

            $cifdni = $seguro->limpiar($_POST["cifdni"]);
            $pass = $seguro->limpiar($_POST["pass"]);

            require_once("./modelos/LoginEmpresaModelo.php");
            $modelo = new LoginEmpresaModelo();

            if($modelo->validar($cifdni, $pass)){
                //Esto crea la sesión
                require_once("./lib/GestorSesion.php");
                $sesion = new GestorSesion();
                $sesion->crearSesion("CLAVE", $cifdni);
            
                require_once("./config/Enrutador.php");
                $ruta = new Enrutador();
                header("Location: ".$ruta->getRuta()."perfilEmpresa/verPerfilEmpresa");
            }else{
                $data["errorLogin"]="Error en usuario o contraseña, vuelva a intentarlo";
                require_once("./vistas/Vista.php");
                $vista = new Vista();
                $vista->render("loginEmpresa",$data);
            }
        }
    }
    
}

?>