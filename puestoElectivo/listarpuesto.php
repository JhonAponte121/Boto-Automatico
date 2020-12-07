<?php 

include "../layout/layout.php";
require_once "../database/servicio.php";
require_once "../database/Iserviciobase.php";
require_once "puestoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "puestoelectivo.php";

$service = new puestoservice("database");

$listarpuesto = $service->Getlista();


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
    <center><h3>Listado de puestos</h3></center>
    <div class="row justify-content-center">
      <table class="table fill">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th colspan="2">Acción</th>
          </tr>
        </thead>
        <tbody>
        <?php

          if($listarpuesto != null)
          {
              foreach ($listarpuesto as $puesto) :        
        
        ?>
            <td><?=$puesto->Nombre?></td>
            <td><?=$puesto->Descripcion?></td>
            <td><?php if ($puesto->Estado == 1) : echo "Activo"; else: echo "Inactivo"; endif; ?></td>
            <td>
              <a href="editarpuesto.php?id=<?php echo $puesto->ID; ?>" class="card-link btn btn-warning btn-block">Editar</a>
              <a href="eliminarpuesto.php?id=<?php echo $puesto->ID; ?>" class="card-link btn btn-danger btn-block ml-0" onclick="return confirm('¿Estas seguro de querer eliminar este puesto?')">Eliminar</a>
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