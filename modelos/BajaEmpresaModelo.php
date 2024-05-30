<?php

class BajaEmpresaModelo{

    public function darBaja($cifdni){

        include_once("./lib/GestorBD.php");
        $gbd = new GestorBD();

        if($gbd->conectar()){
            if($gbd->eliminarEmpresa($cifdni)){
                return true;
            }else{
                return $data["error404"];
            }

        }else{
            return $data["error500"] = true;
        }
    }
}

?>