<?php

class Enrutador{
    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function getRuta(){
        return "http://localhost/ProyectoDAW/jobwheels/";
    }
}

?>