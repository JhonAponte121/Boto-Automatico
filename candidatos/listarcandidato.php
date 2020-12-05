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
require_once "../partidos/partidoservice.php";
require_once "../puestoElectivo/puestoelectivo.php";
require_once "../puestoElectivo/puestoservice.php";




$servicepartido = new partidoservice("database");
$listarpartido = $servicepartido->Getlista();

$servicecandidato = new candidatoservice("database");
$listarcandidato = $servicecandidato->Getlista();

$servicepuesto = new puestoservice("database");
$listarpuestos = $servicepuesto->Getlista();


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



      <h3 class="font-weight-bold">Candidatos</h3>
      <br>


      <div class="row">

        <?php foreach ($listarcandidato as $candidato) : ?>
          <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
            <img class="bd-placeholder-img card-img-top" src="<?php echo "imagenes/candidato/" .  $candidato->Foto ?>" width="100%" height="150" role="img" aria-label="Placeholder: Thumbnail">

            <div class="card-body">
              <h5 class="card-title"> <?php echo $candidato->Nombre ?></h5>
              <h5 class="card-subtitle mb-2"><?php echo $candidato->Apellido ?></h5>
              <h6 class="card-text">Partido: 
                <?php foreach($listarpartido as $partido) : ?>
                  <?php if ($candidato->Partido == $partido->ID) : ?>
                    <td><?php echo "$partido->Nombre"?></td>
                  <?php endif ?>
                <?php endforeach; ?>
                
              </h6>
              <h6 class="card-text">Puesto: 
              

              <?php foreach($listarpuestos as $puesto) : ?>
                  <?php if ($puesto->ID == $candidato->Puesto) : ?>
                    <td><?php echo "$puesto->Nombre"?></td>
                  <?php endif ?>
                <?php endforeach; ?>
                
              

              </h6>
              <!--  -->
              <h6 class="card-text">Votos: 
                    <td><?php echo "$candidato->voto"?></td>
              
              </h6>
              <!--  -->
              <h6 class="card-text">Estado: <?php if ($candidato->Estado == 1) : ?>
                  <td>Activo</td>
                <?php else : ?>
                  <td>Inactivo</td>
                <?php endif ?></h6>
              <a href="editarcandidato.php?id=<?php echo $candidato->ID; ?>" class="card-link btn btn-outline-primary">Editar</a>
              <a href="eliminarcandidato.php?id=<?php echo $candidato->ID; ?>" class="card-link btn btn-outline-danger" onclick="return confirmar()">Eliminar</a>
            </div>

          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php endforeach; ?>
      </div>

      <?php printFooter(true); ?>
      <script type="text/javascript">
        function confirmar() {
          var respuesta = confirm("Seguro de eliminar a este Candidato??");
          if (respuesta == true) {
            return true;
          } else {
            return false;
          }
        }
      </script>