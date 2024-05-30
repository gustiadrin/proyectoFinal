<?php

    class ActualizarEmpresaModelo {

        public function __construct(Type $var = null) {
            $this->var = $var;
        }

        public function actualizarEmpresa($cifdni, $nombreemp, $descripcion, $telefono, $email, $ciudad, $n_vehiculos, $v_disponibles){
        
            require_once("./lib/GestorBD.php");
            $gbd = new GestorBD();

            if($gbd->conectar()){

                if($gbd->updateEmpresa($cifdni, $nombreemp, $descripcion, $telefono, $email, $ciudad, $n_vehiculos, $v_disponibles)){
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