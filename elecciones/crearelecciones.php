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

$serviceeleccion = new eleccionservice("database");
$listarelecciones = $serviceeleccion->Getlista();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $neweleccion = new elecciones();
    $fecha = (new DateTime($_POST['fecha']))->format('Y-m-d H:i:s');

    $neweleccion->enviardatos(rand(1, 999999), $_POST['nombre'], $fecha, 1);

    echo '<script>alert("Eleccion añadida")</script>';

    $serviceeleccion->añadir($neweleccion);


    header("location: listarelecciones.php");
    exit();
}

?>

<?php printHeader(true); ?>


<div class="card con-padding text-white bg-dark mb-3">
    <h5 class="card-header">Crear Eleccion</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST">
            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group row">
                <label class="col col-form-label"><b>Fecha de realización: </b></label>
                <input class="form-control" type="date" name="fecha" value="" required="required"/>
            </div>

            <a href="listarelecciones.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Agregar</button>

        <?php printFooter(true); ?>