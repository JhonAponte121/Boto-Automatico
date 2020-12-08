<link rel="stylesheet" href="..assents/css/stlye.css">
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


<?php

include "../layout/layout.php";
require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "elecciones.php";
require_once "eleccionservice.php";

session_start();

if (!isset($_SESSION['admin_logueado'])) 
{
    header('location:/Boto-Automatico/admin/login.php');
}

date_default_timezone_set('America/Santo_Domingo');
$minDate=date("Y")."-".date("m")."-".(date("d"));

$service = new eleccionservice("database");
$listarelecciones = $service->Getlista();

if (isset($_GET['id'])) {

    $eleccionid = $_GET['id'];
    $elemento = $service->GetByid($eleccionid);
    $elemento->Fecha = (new DateTime($elemento->Fecha))->format('Y-m-d');

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $actualizar = new elecciones();
        $fecha = (new DateTime($_POST['fecha']))->format('Y-m-d H:i:s');

        $actualizar->enviardatos($eleccionid, $_POST['nombre'], $fecha, $_POST['estado']);

        echo '<script>alert("Eleccion actualizada")</script>';

        $service->editar($eleccionid, $actualizar);

        header("location: listarelecciones.php");
        exit();
    } else {
        echo '<script>console.log("formulario invalido")</script>';
    }
} else {
    echo '<script>console.log("Id es requerido")</script>';
}
?>

?>

<?php printHeader(true); ?>

<div class="card con-padding text-white bg-dark mb-3">
    <h5 class="card-header">Editar eleccion</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" action="editarelecciones.php?id=<?php echo  $elemento->ID; ?>" method="POST">



            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" value="<?php echo $elemento->Nombre; ?>" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group row">
                <label class="col col-form-label"><b>Fecha de realización: </b></label>
                <input type="date" class="form-control" id="fecha" value="<?php echo $elemento->Fecha; ?>" name="fecha" required>
            </div>

            <div class="form-group  estado">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" style="width: 1rem" id="active" name="estado" value="1" <?php if($elemento->Estado) echo "checked='checked'" ?>> <label>Activo</label>
                <input type="radio" style="width: 1rem" id="inactive" name="estado" value="0" <?php if(!$elemento->Estado) echo "checked='checked'" ?>> <label>Inactivo</label>
            </div>
            
            <a href=" listarelecciones.php" class="btn btn-outline-secondary btn-block">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-block">Editar</button>


            <?php printFooter(true); ?>