<?php
    
class PerfilEmpresaControlador{
    
    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    // Primero definimos las acciones que hará el controlador
    // Acción 1:



    public function verPerfilEmpresa(){
        require_once("./lib/GestorSesion.php");
        $sesion = new GestorSesion();
        $cifdni= $sesion->obtenerValorSesion("CLAVE");

        require_once("./modelos/PerfilEmpresaModelo.php");
        $modelo = new PerfilEmpresaModelo();
        $datosEmpresa = $modelo->getEmpresa($cifdni);       

        // echo "<pre>";
        // print_r($datosConductor);
        // echo "</pre>";
       
        //Acceder a la vista
        require_once("./vistas/Vista.php");
        $vista = new Vista();
        $vista->render("perfilEmpresa", $datosEmpresa);
        
     }

    
}

 ?>