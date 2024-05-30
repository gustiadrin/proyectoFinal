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



  <main class="px-3">

  <h2 class="display-6 text-center mb-4">Perfil Empresa</h2>

<div class="table-responsive">
  <table class="table text-center">
    <tbody>
    <tr>
        <th scope="row" class="text-start">Nombre Empresa</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["nombre_empresa"]);?></td>
      </tr>
      <tr>
        <th scope="row" class="text-start">Descripción</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["descripcion"]);?></td>
      </tr>
      <tr>
        <th scope="row" class="text-start">Teléfono</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["telefono"]);?></td>
      </tr>
      <tr>
        <th scope="row" class="text-start">Email</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["email"]);?></td>
      </tr>
      <tr>
        <th scope="row" class="text-start">Ciudad</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["ciudad"]);?></td>
      </tr>
      <tr>
        <th scope="row" class="text-start">Cantidad de vehículos</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["n_vehiculos"]);?></td>
      </tr>
      <tr>
        <th scope="row" class="text-start">Vehículos disponibles</th>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
        <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg><?php echo $seguro->limpiar($data[0]["v_disponibles"]);?></td>
      </tr>
    </tbody>

    <tbody>
      
    </tbody>
  </table>
  <button class="btn btn-primary w-100 py-2" type="button" onclick="window.location.href='<?php echo ($ruta);?>actualizarEmpresa/verActualizar'">Actualizar perfil</button>
  <button class="btn btn-primary w-100 py-2" type="button"onclick="window.location.href='<?php echo ($ruta);?>listaConductores/verConductores'">Lista de conductores</button>
  <button class="btn btn-primary w-100 py-2" type="button" onclick="window.location.href='<?php echo ($ruta);?>index.php'">Cerrar sesión</button>
  <a class="warning" href="<?php echo ($ruta);?>bajaEmpresa/verBaja">Darse de baja</a>
</div>
  </main>

<?php
  
  include_once "./vistas/includes/footer.php";
  
  ?>