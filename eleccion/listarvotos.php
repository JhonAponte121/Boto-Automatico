<?php 

include "../layout/layout.php";
require_once "../database/Iserviciobase.php";
require_once "eleccionservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "eleccion.php";


$service = new eleccionservice("database");

$listarvoto = $service->Getlista();

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


<h3 class="font-weight-bold">Votos</h3>
<br>
<div class="row">

<?php foreach ($listarvoto as $voto) : ?>
<div class="card text-white bg-dark cover-container" style=" width: 15rem";>
                 <div class="card-body">
                       <h5 class="card-title"> <?php echo $voto->ID?></h5>
                       <h5 class="card-subtitle mb-2"><?php echo $voto->Nombre?></h5>
                      <h6 class="card-text"><?php echo $voto->Fecha_de_Realizacion?></h6>
                      <h6 class="card-text">Estado: <?php if ($voto->Estado == 1): ?>

<td>Activo</td>
<?php else: ?>

    <td>Inactivo</td>

<?php endif ?></h6>
                      
                 </div>
             </div>
             &nbsp; &nbsp;
             <?php endforeach; ?>
             
</div>

<?php printFooter(true); ?>

<script type="text/javascript">
    function confirmar() {
        var respuesta = confirm("Seguro de eliminar a este Ciudadano??");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
  
 
    </script>