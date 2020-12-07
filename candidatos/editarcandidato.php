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
require_once "candidatoservice.php";
require_once "../puestoElectivo/puestoservice.php";
require_once "../partidos/partidoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "candidato.php";

session_start();

if (!isset($_SESSION['admin_logueado'])) 
{
    header('location:/Boto-Automatico/admin/login.php');
}

$service = new candidatoservice("database");
$servicepuesto = new puestoservice("database");
$servicepartido = new partidoservice("database");

$listarpuesto = $servicepuesto->Getlista();
$listarpartido = $servicepartido->Getlista();

if (isset($_GET['id'])) {

    $candidatoid = $_GET['id'];
    $elemento = $service->GetByid($candidatoid);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $actualizar = new candidato();

        $actualizar->enviardatos($candidatoid, $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], $_POST['estado'], 0);

        echo '<script>alert("Candidato actualizado")</script>';

        $service->editar($candidatoid, $actualizar);


        header("location: listarcandidato.php");
        exit();
    } else {
        echo '<script>console.log("formulario invalido")</script>';
    }
} else {
    echo '<script>console.log("Id es requerido")</script>';
}
?>

<?php printHeader(true); ?>


<div class="card con-padding text-white bg-dark mb-3">
    <h5 class="card-header">Crear Candidato</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" action="editarcandidato.php?id=<?php echo  $elemento->ID; ?>" method="POST">



            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" value="<?php echo $elemento->Nombre; ?>" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="apellido" value="<?php echo $elemento->Apellido; ?>" name="apellido" placeholder="Apellido" required>
            </div>

            <div class="form-group">
                <label>Partido: </label>
                <select class="selectpicker ml-3" data-show-subtext="true" id="partido" name="partido" data-live-search="true" required>
                    <?php foreach ($listarpartido as $partido) : ?>
                        <option value="<?php echo $partido->ID ?>" <?php if($elemento->Partido == $partido->ID) echo 'selected="select"' ?>  ><?php echo $partido->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Puesto: </label>
                <select class="selectpicker ml-3" data-show-subtext="true" id="puesto" name="puesto" data-live-search="true" required>
                    <?php foreach ($listarpuesto as $puesto) : ?>
                        <option value="<?php echo $puesto->ID ?>" <?php if($elemento->Puesto == $puesto->ID) echo 'selected="select"' ?>  ><?php echo $puesto->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!--  -->


            <img class="mb-3" src="imagenes/candidato/<?php echo $elemento->Foto ?>" width="100" height="100">
            
            <div class="form-group">
                <input type="file" class="form-control" id="foto" accept="image/*" name="foto">
            </div>

            <div class="form-group  estado">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" style="width: 1rem" id="active" name="estado" value="1" <?php if($elemento->Estado) echo "checked='checked'" ?>> <label>Activo</label>
                <input type="radio" style="width: 1rem" id="inactive" name="estado" value="0" <?php if(!$elemento->Estado) echo "checked='checked'" ?>> <label>Inactivo</label>
            </div>

            <a href=" listarcandidato.php" class="btn btn-outline-secondary btn-block">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-block">Editar</button>


            <?php printFooter(true); ?>