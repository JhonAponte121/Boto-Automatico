<link rel="stylesheet" href="..assents/css/stlye.css">

<?php 

include "../layout/layout.php";
 require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "ciudadanoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "ciudadano.php";

session_start();

if (!isset($_SESSION['admin_logueado'])) 
{
    header('location:/Boto-Automatico/admin/login.php');
}

$service = new ciudadanoservice("database");
if(isset($_GET['id']  )){

    $ciudadanoid=$_GET['id'];
    $elemento=$service->GetByid($ciudadanoid);

if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido'])
&& isset($_POST['email'])) {

  $actualizar = new ciudadano();
  
   $actualizar->enviardatos($ciudadanoid,$_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['estado']);

   echo '<script>alert("Ciudadano añadido")</script>'; 
  
  $service->editar($ciudadanoid,$actualizar);
  
      header("location: listarciudadano.php");
      exit();
  
    }
    }
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


            <div class="card text-white bg-dark mb-3">
                <h5 class="card-header">Editar Ciudadano</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST"action="editarciudadano.php?id=<?php echo  $elemento->Identidad; ?>">

                        <div class="form-group">

                            <div class="form-group">
                                <input type="text" class="form-control" id="id" name="id"
                                    placeholder="Documento de Identidad" value="<?php echo $elemento->Identidad;?>">
                            </div>

                            <input type="text" class="form-control" id="nombre" name="nombre"value="<?php echo $elemento->Nombre;?>" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Apellido"value="<?php echo $elemento->Apellido;?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $elemento->Email;?>">
                        </div>

                        <div class="form-group estado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <input type="radio" style="width: 1rem" id="active" name="estado" value="1" <?php if($elemento->Estado) echo "checked='checked'" ?>> <label>Activo</label>
                            <input type="radio" style="width: 1rem" id="inactive" name="estado" value="0" <?php if(!$elemento->Estado) echo "checked='checked'" ?>> <label>Inactivo</label>
                        </div>

                        <br>

                        <a href=" listarciudadano.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Agregar</button>

                    </form>


                    <?php printFooter(true); ?>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
