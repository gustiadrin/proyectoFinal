<?php

class LoginEmpresaModelo{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function validar($cifdni, $pass){
        require_once("./lib/GestorBD.php");
        $gbd = new GestorBD;

        if($gbd->conectar()){
            if($gbd->loginEmpresa($cifdni, $pass)){
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