<?php

class GestorBD{

    private $conexion;

    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function conectar(){

        $despliegue = ConfiguracionDespliegue::getInstance();

        $servidor = $despliegue->getServidorBD();
        $usuario = $despliegue->getUsuarioBD();
        $contrasena = $despliegue->getContrasenaBD();
        $nombre = $despliegue->getNombreBD();

        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $nombre);

        // $config = parse_ini_file(__DIR__."/../config/config.ini");
        
        // $this->conexion = new mysqli($config["host"], $config["user"], $config["pass"], $config["bd"]);

        

       
        if($this->conexion->connect_error!=null){
            return false;
        }else{
            return true;
        }
    }

    public function loginConductor($dni, $contrasena){

        //password_verify($contraseña_usuario_ingresada, $hash_contraseña_bd);

        $sql = "SELECT contrasena FROM conductor WHERE dni='".$dni."'";

        $data = array();

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            while($row = $resultadoConsulta->fetch_assoc()){
                $data[] = $row;
            }
            $contrasena_bd = $data[0]['contrasena'];
        }else{
            return false;
        }

        if (password_verify($contrasena, $contrasena_bd)) {
            // La contraseña es válida
            return true;
        } else {
            // La contraseña no es válida
            return false;
        }

    }

    public function loginEmpresa($cifdni, $pass){

        //password_verify($contraseña_usuario_ingresada, $hash_contraseña_bd);

        $sql = "SELECT contrasena FROM empresa WHERE cif='".$cifdni."'";

        $data = array();

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            while($row = $resultadoConsulta->fetch_assoc()){
                $data[] = $row;
            }
            $contrasena_bd = $data[0]['contrasena'];
        }else{
            return false;
        }

        if (password_verify($pass, $contrasena_bd)) {
            // La contraseña es válida
            return true;
        } else {
            // La contraseña no es válida
            return false;
        }

    }

    public function existeConductor($dni){
        $sql = "SELECT * FROM conductor WHERE dni='".$dni."'"; 

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function existeEmpresa($cif){
        $sql = "SELECT * FROM empresa WHERE cif='".$cif."'";
        
        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function getConductorDni($dni){
        $sql = "SELECT * FROM conductor WHERE dni='".$dni."'";

        $data = array();

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            while($row = $resultadoConsulta->fetch_assoc()){
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getEmpresa($cifdni){
        $sql = "SELECT * FROM empresa WHERE cif='".$cifdni."'";

        $data = array();

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            while($row = $resultadoConsulta->fetch_assoc()){
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getConductores(){
        $sql = "SELECT nombre, telefono, ciudad, presentacion FROM conductor WHERE disponible = 0";

        $data = array();

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            while($row = $resultadoConsulta->fetch_assoc()){
                $data[] = $row;
            }
        }

        return $data;
    }


    public function getEmpresas(){
        $sql = "SELECT nombre_empresa, descripcion, telefono, email, ciudad, n_vehiculos, v_disponibles FROM empresa WHERE v_disponibles > 0";

        $data = array();

        $resultadoConsulta = $this->conexion->query($sql);

        if($resultadoConsulta->num_rows>0){
            while($row = $resultadoConsulta->fetch_assoc()){
                $data[] = $row;
            }
        }

        return $data;
    }

    public function updateEmpresa($cifdni, $nombreemp, $descripcion, $telefono, $email, $ciudad, $n_vehiculos, $v_disponibles){
        $sql = "UPDATE `empresa` SET `nombre_empresa`='".$nombreemp."', `descripcion`='".$descripcion."', `telefono`='".$telefono."', `email`='".$email."', `ciudad`='".$ciudad."', `n_vehiculos`='".$n_vehiculos."', `v_disponibles`='".$v_disponibles."' WHERE `cif`='".$cifdni."'";  
        if($result = $this->conexion->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    public function updateConductor($dni, $nombre, $telefono, $ciudad, $disponible, $presentacion){
        $sql = "UPDATE `conductor` SET `nombre`='".$nombre."',`telefono`='".$telefono."',`ciudad`='".$ciudad."',`disponible`=".$disponible.",`presentacion`='".$presentacion."' WHERE dni='".$dni."'";  
        if($result = $this->conexion->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    public function insertConductor($dni, $contrasena){
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `conductor`(`dni`, `contrasena`) VALUES ('".$dni."','".$contrasena."')";
        if($result = $this->conexion->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    public function insertEmpresa($cif, $contrasena){
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `empresa`(`cif`, `contrasena`) VALUES ('".$cif."','".$contrasena."')";
        if($result = $this->conexion->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    public function eliminarConductor($dni){
        $sql = "DELETE FROM `conductor` WHERE dni = '".$dni."'";
        if($result = $this->conexion->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    public function eliminarEmpresa($cifdni){
        $sql = "DELETE FROM `empresa` WHERE cif = '".$cifdni."'";
        if($result = $this->conexion->query($sql)){
            return true;
        }else{
            return false;
        }
    }

}

?>