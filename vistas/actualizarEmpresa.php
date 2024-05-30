<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <script src="<?php echo ($ruta);?>assets/js/color-modes.js"></script>
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
  
  <main class="px-3">
    <form action="<?php echo ($ruta);?>actualizarEmpresa/actualizarEmpresa" method="POST">
      <h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellido">
        <label for="nombre">Nombre de la empresa:</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DNI">
        <label for="dni">Descripción</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Nro Telefono">
        <label for="telefono">Teléfono</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        <label for="email">Email</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
        <label for="ciudad">Ciudad</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="n_vehiculos" name="n_vehiculos" placeholder="Cantidad de vehículos">
        <label for="n_vehiculos">Cantidad de vehículos</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="v_disponibles" name="v_disponibles" placeholder="Vehículos disponibles">
        <label for="v_disponibles">Vehículos disponibles</label>
      </div>
      <div>
      <?php
          if(isset($data["errorLogin"])){
            echo $data["errorLogin"];
          }
        ?>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Actualizar</button>
    </form>
    <button class="btn btn-primary w-100 py-2" type="button" onclick="window.location.href='<?php echo ($ruta);?>perfilEmpresa/verPerfilEmpresa'">Volver</button>
  </main>

  <?php
    include_once "./vistas/includes/footer.php";
  ?>
</div>
</body>
</html>