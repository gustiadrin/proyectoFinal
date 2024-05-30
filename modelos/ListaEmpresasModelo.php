<?php

    class ListaEmpresasModelo{

        public function __construct(Type $var = null) {
            $this->var = $var;
        }

        public function listadoEmpresas(){
            include_once("./lib/GestorBD.php");
            $gbd = new GestorBD();

            if($gbd->conectar()){
                $data = $gbd->getEmpresas();
            }else{
                return $data["errorConexion"]=true;
            }

            return $data;
        }

    }

?>