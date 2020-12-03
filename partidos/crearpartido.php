<link rel="stylesheet" href="..assents/css/stlye.css">


<?php 

include "../layout/layout.php";
require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "partidoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "partido.php";

$service = new partidoservice("database");

if (isset($_POST['nombre']) && isset($_POST['desc'])
&&  isset($_FILES['Logo_Partido'])
&& isset($_POST['estado'])) {

  $newpartido = new partido();
  
   $newpartido->enviardatos(0,$_POST['nombre'],$_FILES['Logo_Partido'],$_POST['desc'],$_POST['estado']);

   echo '<script>alert("Partido añadido")</script>'; 
  
  $service->añadir($newpartido);
  
   
      header("location: listarpartido.php");
      exit();
    }
?>

<?php printHeader(true); ?>

<div class="card text-white bg-dark mb-3">
    <h5 class="card-header">Crear Partido</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST">

            <div class="form-group">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="desc" name="desc" placeholder="Descripcion">
            </div>

            <div class="form-group">
                <input type="file" class="form-control" id="logo" name="Logo_Partido">
            </div>

            <div class="estado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" style="width: 1rem" id="read" name="estado"  value="1" checked
                             placeholder="Estado"> <label >Activo</label> 
                             <input type="checkbox" style="width: 1rem" id="read" disabled name="estado"  value="0"
                             placeholder="Estado"> <label >Inactivo</label> 
                        </div>
            <div></div>

            <a href=" listarpartido.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Agregar</button>


            <?php printFooter(true); ?>