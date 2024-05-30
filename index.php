<?php
require_once ("./controladores/Controlador.php");
require_once ("./config/ConfiguracionDespliegue.php");

session_start();
$controlador = new Controlador();
$controlador->main();

?>