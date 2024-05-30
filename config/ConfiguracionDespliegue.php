<?php

class ConfiguracionDespliegue{

    private static $instance = null;

    private $rutaServidor;
    private $servidorBD;
    private $usuarioBD;
    private $contrasenaBD;
    private $nombreBD;

    public function __construct(Type $var = null) {

        if (file_exists("local.txt")){
            $this->rutaServidor = "http://localhost/ProyectoDAW/jobwheels/";
            $this->servidorBD = "localhost";
            $this->usuarioBD = "root";
            $this->contrasenaBD = "";
            $this->nombreBD = "proyectodaw";
        }
    
        if (file_exists("pruebas.txt")){
            $this->rutaServidor = "http://preproduccion.free.nf/";
            $this->servidorBD = "sql105.infinityfree.com";
            $this->usuarioBD = "if0_36402758";
            $this->contrasenaBD = "Gustavo618";
            $this->nombreBD = "if0_36402758_pruebasJobWheels";
        }
    
        if (file_exists("produccion.txt")){
            $this->rutaServidor = "";
            $this->servidorBD = "";
            $this->usuarioBD = "";
            $this->contrasenaBD = "";
            $this->nombreBD = "";
        }
    }


    public function getRutaServidor(){
        return $this->rutaServidor;
    }

    public function getServidorBD(){
        return $this->servidorBD;
    }

    public function getUsuarioBD(){
        return $this->usuarioBD;
    }

    public function getContrasenaBD(){
        return $this->contrasenaBD;
    }

    public function getNombreBD(){
        return $this->nombreBD;
    }

    public static function getInstance(){
        //if(self::$instance == null){
            self::$instance = new ConfiguracionDespliegue();
        //}

        return self::$instance;
    }
}

?>