<?php

class PerfilEmpresaModelo{

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function getEmpresa($cifdni){

        require_once("./lib/GestorBD.php");
        $gbd = new GestorBD;

        if($gbd->conectar()){
            $data = $gbd->getEmpresa($cifdni);
        }else{
            return $data["errorConexion"]=true;
        }

        return $data;
    }

}
