<?php

include "../layout/layout.php";
require_once "../database/servicio.php";
require_once "../database/Iserviciobase.php";
require_once "candidatoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "../partidos/partido.php";
require_once "candidato.php";
require_once "../partidos/partido.php";
require_once "../partidos/partidoservice.php";
require_once "../puestoElectivo/puestoelectivo.php";
require_once "../puestoElectivo/puestoservice.php";


$servicepartido = new partidoservice("database");
$listarpartido = $servicepartido->Getlista();

$servicecandidato = new candidatoservice("database");
$listarcandidato = $servicecandidato->Getlista();

$servicepuesto = new puestoservice("database");
$listarpuestos = $servicepuesto->Getlista();

$partido = new partido();


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
    <center><h3>Listado de candidatos</h3></center>
    <div class="row justify-content-center">
      <table class="table fill">
        <thead>
          <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Partido al que pertenece</th>
            <th>Puesto al que aspira</th>
            <th>Estado</th>
            <th colspan="2">Acción</th>
          </tr>
        </thead>
        <tbody>
        <?php

          if($listarcandidato != null)
          {
              foreach ($listarcandidato as $candidato) :        
        
        ?>
            <td><img src="imagenes/candidato/<?php echo $candidato->Foto ?>" width="100" height="100"></td>
            <td><?=$candidato->Nombre?></td>
            <td><?=$candidato->Apellido?></td>
            <td><?=$servicepartido->GetByid($candidato->Partido)->Nombre ?></td>
            <td><?=$servicepuesto->GetByid($candidato->Puesto)->Nombre ?></td>
            <td><?php if ($candidato->Estado == 1) : echo "Activo"; else: echo "Inactivo"; endif; ?></td>
            <td>
              <a href="editarcandidato.php?id=<?php echo $candidato->ID; ?>" class="card-link btn btn-warning btn-block">Editar</a>
              <a href="eliminarcandidato.php?id=<?php echo $candidato->ID; ?>" class="card-link btn btn-danger btn-block ml-0" onclick="return confirm('¿Estas seguro de querer eliminar este candidato?')">Eliminar</a>
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