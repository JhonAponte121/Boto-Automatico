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






<h3 class="font-weight-bold">Puestos</h3>
<br>


<div class="row">

<?php foreach ($listarpuesto as $puesto) : ?>
  <div class="card text-white bg-dark cover-container" style=" width: 14rem";>

                 <div class="card-body">
                       <h5 class="card-title"> <?php echo $puesto->Nombre?></h5>
                       <h5 class="card-subtitle mb-2"><?php echo $puesto->Descripcion?></h5>
                      <h6 class="card-text">Estado: <?php if ($puesto->Estado == 1): ?>

<td>Activo</td>
<?php else: ?>

    <td>Inactivo</td>

<?php endif ?></h6>
                      <a href="editarpuesto.php?id=<?php echo $puesto->ID; ?>" class="card-link btn btn-outline-primary">Editar</a>
                      <a href="eliminarpuesto.php?id=<?php echo $puesto->ID; ?>" class="card-link btn btn-outline-danger"
                                    onclick="return confirmar()">Eliminar</a>
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