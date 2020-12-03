<link rel="stylesheet" href="..assents/css/stlye.css">


<?php 

include "../layout/layout.php";
require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "candidatoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "candidato.php";




$service = new candidatoservice("database");

if (isset($_POST['nombre']) && isset($_POST['apellido'])
&& isset($_POST['partido'])&& isset($_POST['puesto'])&& isset($_FILES['foto'])
&& isset($_POST['estado'])) {

  $newcandidato = new candidato();
  
   $newcandidato->enviardatos(0, $_POST['nombre'],$_POST['apellido'],$_POST['partido'],$_POST['puesto'],$_POST['estado'], $_POST['voto']);

   echo '<script>alert("Ciudadano añadido")</script>'; 
  
  $service->añadir($newcandidato);
  
   
      header("location: listarcandidato.php");
      exit();
  
  
    }

?>

<?php printHeader(true); ?>


<div class="card text-white bg-dark mb-3">
    <h5 class="card-header">Crear Candidato</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST">



            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="partido" name="partido" placeholder="Partido">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto">
            </div>

            <div class="form-group">
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="estado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" style="width: 1rem" id="read" name="estado"  value="1" checked
                             placeholder="Estado"> <label >Activo</label> 
                             <input type="checkbox" style="width: 1rem" id="read" disabled name="estado"  value="0"
                             placeholder="Estado"> <label >Inactivo</label> 
                        </div>

            <a href=" listarcandidato.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Agregar</button>


            <?php printFooter(true); ?>