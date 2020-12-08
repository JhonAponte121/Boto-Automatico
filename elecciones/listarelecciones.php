<?php

include "../layout/layout.php";
require_once "../database/servicio.php";
require_once "../database/Iserviciobase.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "../partidos/partido.php";
require_once "../partidos/partidoservice.php";
require_once "../puestoElectivo/puestoelectivo.php";
require_once "elecciones.php";
require_once "eleccionservice.php";

session_start();

if (!isset($_SESSION['admin_logueado'])) 
{
    header('location:/Boto-Automatico/admin/login.php');
}

$serviceelecciones = new eleccionservice("database");
$listarelecciones = $serviceelecciones->Getlista();

?>

<body class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-10%">
      <div class="inner">
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="../admin/admin.php">Atras</a>
        </nav>
      </div>
      <?php printHeader(true); ?>

    <div class="contenedor">
    <center><h3>Listado de elecciones</h3></center>
    <div class="row justify-content-center">
      <table class="table fill">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th colspan="2">Acción</th>
          </tr>
        </thead>
        <tbody>
        <?php

          if($listarelecciones != null)
          {
              foreach ($listarelecciones as $eleccion) :        
        
        ?>
            <td><?=$eleccion->Nombre?></td>
            <td><?=(new DateTime($eleccion->Fecha))->format('Y-m-d');?></td>
            <td><?php if ($eleccion->Estado == 1) : echo "Activo"; else: echo "Inactivo"; endif; ?></td>
            <td>
              <a href="editarelecciones.php?id=<?php echo $eleccion->ID; ?>" class="card-link btn btn-warning btn-block">Editar</a>
              <a href="eliminarelecciones.php?id=<?php echo $eleccion->ID; ?>" class="card-link btn btn-danger btn-block ml-0" onclick="return confirm('¿Estas seguro de querer eliminar esta eleccion?')">Eliminar</a>
            </td>
          </tr>

        <?php
          endforeach;
        }

        ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php printFooter(true); ?>