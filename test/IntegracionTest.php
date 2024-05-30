<?php
//--------------------Test de integración-----------------//

use PHPUnit\Framework\TestCase;
require_once("./modelos/RegistroModelo.php");
require_once("./modelos/LoginConductorModelo.php");


class IntegracionTest extends TestCase{

    public function testCrearConductor(){
        $modelo = new RegistroModelo();
        $this->assertNotEquals($modelo->crearConductor("55506849y", "1q"), true);
    }

    public function testValidar(){
        $modelo = new LoginConductorModelo();
        $this->assertEquals($modelo->validar("55506849y","1q"), true);
    }

}


?>