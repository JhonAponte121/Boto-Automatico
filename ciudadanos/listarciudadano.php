<?php 

include "../layout/layout.php";
require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "ciudadanoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "ciudadano.php";

$service = new ciudadanoservice("database");

$listarciudadano = $service->Getlista();

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
                <center><h3>Listado de ciudadanos</h3></center>
                <div class="row justify-content-center">
                  <table class="table fill">
                    <thead>
                      <tr>
                        <th>Documento de Identidad</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th colspan="2">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      if($listarciudadano != null)
                      {
                          foreach ($listarciudadano as $ciudadano) :        
                    
                    ?>
                        <td><?=$ciudadano->Identidad?></td>
                        <td><?=$ciudadano->Nombre?></td>
                        <td><?=$ciudadano->Apellido?></td>
                        <td><?=$ciudadano->Email?></td>
                        <td><?php if ($ciudadano->Estado == 1) : echo "Activo"; else: echo "Inactivo"; endif; ?></td>
                        <td>
                          <a href="editarciudadano.php?id=<?php echo $ciudadano->Identidad; ?>" class="card-link btn btn-warning btn-block">Editar</a>
                          <a href="eliminarciudadano.php?id=<?php echo $ciudadano->Identidad; ?>" class="card-link btn btn-danger btn-block ml-0" onclick="return confirm('¿Estas seguro de querer eliminar este ciudadano?')">Eliminar</a>
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
