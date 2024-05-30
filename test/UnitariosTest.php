<?php
//-------------------Tests unitarios------------------//

use PHPUnit\Framework\TestCase;
require_once("./lib/GestorBD.php");

class UnitariosTest extends TestCase{

    public function testConectar(){
        $gbd = new GestorBD();
        $this->assertEquals($gbd->conectar(), true);
    }

    public function testGetEmpresas(){
        $gbd = new GestorBD();
        $gbd->conectar();
        $this->assertIsArray($gbd->getEmpresas());
    }

}

?>