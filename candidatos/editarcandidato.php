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
if(isset($_GET['id']  )){

  $candidatoid=$_GET['id'];
  $elemento=$service->GetByid($candidatoid);

if (isset($_POST['nombre']) && isset($_POST['apellido'])
&& isset($_POST['partido'])&& isset($_POST['puesto'])&& isset($_FILES['foto'])
&& isset($_POST['estado'])) {

  $actualizar = new candidato();
  
   $actualizar->enviardatos($candidatoid,$_POST['nombre'],$_POST['apellido'],$_POST['partido'],$_POST['puesto'],$_POST['estado'],0);

   echo '<script>alert("Ciudadano actualizado")</script>'; 
  
  $service->editar($candidatoid,$actualizar);
  
   
      header("location: ../admin/admin.php");
      exit();
  
  
    }
  }
?>

<?php printHeader(true); ?>


<div class="card text-white bg-dark mb-3">
    <h5 class="card-header">Crear Candidato</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" action="editarcandidato.php?id=<?php echo  $elemento->ID; ?>" method="POST">



            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" value="<?php echo $elemento->Nombre;?>"
                    name="nombre" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="apellido" value="<?php echo $elemento->Apellido;?>"
                    name="apellido" placeholder="Apellido">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="partido" value="<?php echo $elemento->Partido;?>"
                    name="partido" placeholder="Partido">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="puesto" value="<?php echo $elemento->Puesto;?>"
                    name="puesto" placeholder="Puesto">
            </div>
            <img class="bd-placeholder-img card-img-top" src="<?php echo "imagenes/candidato/" . $elemento->Foto ?>"
                width="100%" style=" width: 15rem" height="200" aria-label="Placeholder: Thumbnail">
            <div class="form-group">
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="form-group  estado">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="checkbox" style="width: 1rem" id="read" name="estado"  value="1" 
                             placeholder="Estado" value="<?php echo $elemento->Estado;?>"> <label >Activo</label> 
                             <input type="checkbox" style="width: 1rem" id="read"  name="estado"  value="0"
                             placeholder="Estado"> <label >Inactivo</label> 
            </div>

            <a href=" listarcandidato.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Editar</button>


            <?php printFooter(true); ?>