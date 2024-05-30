<?php

class BajaConductorModelo{

    public function darBaja($dni){

        include_once("./lib/GestorBD.php");
        $gbd = new GestorBD();

        if($gbd->conectar()){
            if($gbd->eliminarConductor($dni)){
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