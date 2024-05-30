<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="<?php echo ($ruta);?>assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>JobWheels</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="<?php echo ($ruta);?>assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo ($ruta);?>assets/css/estilos.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-bg-dark">
 
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <?php
  
  include_once "./vistas/includes/header.php";
  
  ?>

<!-- LOGIN -->
<form method="POST" action="<?php echo ($ruta);?>loginEmpresa/logearse">
      <h1>Login</h1>
      <h1 class="h3 mb-3 fw-normal">Introduzca CIF y contraseña</h1>
  
      <div class="form-floating">
        <input type="text" class="form-control" id="cifdni" name="cifdni" placeholder="00000000X">
        <label for="cifdni">CIF/DNI</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
        <label for="pass">Contraseña</label>
      </div>
  
      <div class="warning">
        <?php
          if(isset($data["errorLogin"])){
            echo $data["errorLogin"];
          }
        ?>
      </div>
      
      <button class="btn btn-primary w-100 py-2" type="submit">Aceptar</button>
      <button class="btn btn-primary w-100 py-2" type="button" onclick="window.location.href='<?php echo ($ruta);?>index'">Cancelar</button>
    </form>
  <!-- LOGIN -->

  <?php
  
  include_once "./vistas/includes/footer.php";
  
  ?>