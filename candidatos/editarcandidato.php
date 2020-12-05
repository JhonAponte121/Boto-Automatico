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
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "candidato.php";

$service = new candidatoservice("database");
$servicepuesto = new puestoservice("database");

$listarpuesto = $servicepuesto->Getlista();

if (isset($_GET['id'])) {

    $candidatoid = $_GET['id'];
    $elemento = $service->GetByid($candidatoid);

    if (
        isset($_POST['nombre']) && isset($_POST['apellido'])
        && isset($_POST['partido']) && isset($_POST['puesto'])
        && isset($_POST['estado'])
    ) {

        $actualizar = new candidato();

        $actualizar->enviardatos($candidatoid, $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], $_POST['estado'], 0);

        echo '<script>alert("Ciudadano actualizado")</script>';

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


<div class="card text-white bg-dark mb-3">
    <h5 class="card-header">Crear Candidato</h5>
    <div class="card-body">
        <form enctype="multipart/form-data" action="editarcandidato.php?id=<?php echo  $elemento->ID; ?>" method="POST">



            <div class="form-group ">
                <input type="text" class="form-control" id="nombre" value="<?php echo $elemento->Nombre; ?>" name="nombre" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="apellido" value="<?php echo $elemento->Apellido; ?>" name="apellido" placeholder="Apellido">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="partido" value="<?php echo $elemento->Partido; ?>" name="partido" placeholder="Partido">
            </div>

            <!-- <div class="form-group">
                <input type="text" class="form-control" id="puesto" value="<?php echo $elemento->Puesto; ?>"
                    name="puesto" placeholder="Puesto">
            </div> -->

            <!--  -->


            <select class="selectpicker" data-show-subtext="true" id="puesto" name="puesto" data-live-search="true">
                <?php foreach ($listarpuesto as $puesto) : ?>
                    <option value="<?php echo $puesto->ID ?>" <?php if($elemento->Puesto == $puesto->ID) echo 'selected="select"' ?>  ><?php echo $puesto->Nombre; ?></option>
                <?php endforeach; ?>

            </select>

            <!--  -->


            <img class="bd-placeholder-img card-img-top" src="<?php echo "imagenes/candidato/" . $elemento->Foto ?>" width="100%" style=" width: 15rem" height="200" aria-label="Placeholder: Thumbnail">
            <div class="form-group">
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="form-group  estado">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" style="width: 1rem" id="active" name="estado" value="1" <?php if($elemento->Estado) echo "checked='checked'" ?>> <label>Activo</label>
                <input type="radio" style="width: 1rem" id="inactive" name="estado" value="0" <?php if(!$elemento->Estado) echo "checked='checked'" ?>> <label>Inactivo</label>
            </div>

            <a href=" listarcandidato.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Editar</button>


            <?php printFooter(true); ?>