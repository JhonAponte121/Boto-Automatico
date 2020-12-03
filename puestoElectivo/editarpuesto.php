<link rel="stylesheet" href="..assents/css/stlye.css">


<?php 

include "../layout/layout.php";
require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "puestoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "puestoelectivo.php";

$service = new puestoservice("database");
if(isset($_GET['id']  )){

  $puestoid=$_GET['id'];
  $elemento=$service->GetByid($puestoid);

if (isset($_POST['nombre']) && isset($_POST['desc'])

&& isset($_POST['estado'])) {

  $actualizar = new puestoelectivo();
  
   $actualizar->enviardatos($puestoid,$_POST['nombre'],$_POST['desc'],$_POST['estado']);

   echo '<script>alert("Partido actualizado")</script>'; 
  
  $service->editar($puestoid,$actualizar);
  
   
      header("location: listarpuesto.php");
      exit();
    }
  }
?>

<?php printHeader(true); ?>

<div class="card text-white bg-dark mb-3">
    <h5 class="card-header">Editar Partido</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" action="editarpuesto.php?id=<?php echo  $elemento->ID;?>" method="POST">


            <div class="form-group">
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo $elemento->Nombre;?>" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="desc" value="<?php echo $elemento->Descripcion;?>"
                    name="desc" placeholder="Descripcion">
            </div>


            <div class="form-group ">
            <input type="checkbox" style="width: 1rem" id="read" name="estado"  value="1" 
                             placeholder="Estado" value="<?php echo $elemento->Estado;?>"> <label >Activo</label> 
                             <input type="checkbox" style="width: 1rem" id="read"  name="estado"  value="0"
                             placeholder="Estado"> <label >Inactivo</label> 
            </div>
            <div></div>

            <a href=" listarpuesto.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Guardar</button>

            <?php printFooter(true); ?>