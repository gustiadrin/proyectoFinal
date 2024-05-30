<?php

class LoginConductorModelo{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function validar($dni, $contrasena){
        require_once("./lib/GestorBD.php");
        $gbd = new GestorBD;

        if($gbd->conectar()){
            if($gbd->loginConductor($dni, $contrasena)){
               return true;
            }else{
                return false;
            }
        }else{
            return $data["errorConexion"]=true;
        }

    }

}

?>