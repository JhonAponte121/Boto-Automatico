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
require_once "../puestoElectivo/puestoservice.php";
require_once "candidatoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "../partidos/partido.php";
require_once "../partidos/partidoservice.php";
require_once "candidato.php";

$service = new candidatoservice("database");
$servicepuesto = new puestoservice("database");

$listarpuesto = $servicepuesto->Getlista();


$servicepartido = new partidoservice("database");
$listarpartido = $servicepartido->Getlista();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $newcandidato = new candidato();

    $newcandidato->enviardatos(rand(1, 999999), $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], $_POST['estado'], 0);

    echo '<script>alert("Candidato añadido")</script>';

    $service->añadir($newcandidato);


    header("location: listarcandidato.php");
    exit();
}

?>

<?php printHeader(true); ?>


<div class="card con-padding text-white bg-dark mb-3">
    <h5 class="card-header">Crear Candidato</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST">
            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
            </div>
            <!-- <div class="form-group">
                <input type="text" class="form-control" id="partido" name="partido" placeholder="Partido">
            </div> -->

            <!-- <div class="form-group">
                <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto">
            </div> -->
            <!--  -->

            <div class="form-group">
                <label>Partido: </label>
                <select class="selectpicker" data-show-subtext="true" id="puesto" name="partido" data-live-search="true" required>
                <?php foreach ($listarpartido as $partido) : ?>
                    <option value="<?php echo $partido->ID?>"><?php echo $partido->Nombre; ?></option>
                 <?php endforeach; ?>      
                </select>
            </div>

            <div class="form-group">
                <label>Puesto: </label>
                <select class="selectpicker" data-show-subtext="true" id="puesto" name="puesto" data-live-search="true" required>
                <?php foreach ($listarpuesto as $puesto) : ?>
                    <option value="<?php echo $puesto->ID?>"><?php echo $puesto->Nombre; ?></option>
                 <?php endforeach; ?>
                </select>
            </div>

            <!--  -->

            <div class="form-group">
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            </div>

            <div class="estado">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" style="width: 1rem" id="active" name="estado" value="1" checked><label class="mr-3">Activo</label>
                <input type="radio" class="ml-3" style="width: 1rem" id="inactive" name="estado" value="0"> <label>Inactivo</label>
            </div>

            <a href=" listarcandidato.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Agregar</button>

        <?php printFooter(true); ?>