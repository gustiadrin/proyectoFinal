<?php

    class ListaConductoresModelo{

        public function __construct(Type $var = null) {
            $this->var = $var;
        }

        public function listadoConductores(){
            include_once("./lib/GestorBD.php");
            $gbd = new GestorBD();

            if($gbd->conectar()){
                $data = $gbd->getConductores();
            }else{
                return $data["errorConexion"]=true;
            }

            return $data;
        }

    }

?>