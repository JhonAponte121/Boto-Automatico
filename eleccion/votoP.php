<link rel="stylesheet" href="../assents/css/stlye.css">
<header>

    </div>
    </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="../database/logaut.php" class="navbar-brand d-flex align-items-center">

                <strong>Cerrar Session</strong>

            </a>
        </div>
    </div>
</header>

<?php

include "../layout/layout.php";
require_once "../auth.php";
require_once "../database/servicio.php";
require_once "../database/Iserviciobase.php";
require_once "../candidatos/candidatoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "../candidatos/candidato.php";
require_once "../puestoElectivo/puestoservice.php";

require_once "../partidos/partido.php";
require_once "../partidos/partidoservice.php";


$islogged = false;
if (isset($_SESSION['identidad']) && $_SESSION['identidad'] != null) {
    $identidad = json_decode($_SESSION['identidad']);
    $islogged = true;
}

$service = new candidatoservice("../database");
$servicio = new Servicio();

$servicepuesto = new puestoservice("database");
$listarpuesto = $servicepuesto->Getlista();

$servicepartido = new partidoservice("database");
$listarpartido = $servicepartido->Getlista();

$voto = 1;

if (isset($_GET['id'])) {

    $candidatoid = $_GET['id'];
    $elemento = $service->GetByid($candidatoid);
}

$listarcandidato = $service->GetlistaP();

?>

<?php printHeader(true); ?>


<?php foreach ($listarpuesto as $puesto) : ?>
    <h3 class="font-weight-bold"><?php echo $puesto->Nombre ?></h3>
    <br>
    <div class="row">
        <?php $list = $service->GetByidPuesto($puesto->ID) ?>

        <?php if ($list != null) : ?>
            <?php foreach ($list as $candidato) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;

                <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
                    <img class="bd-placeholder-img card-img-top" src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->Foto ?>" width="100%" height="150" role="img" aria-label="Placeholder: Thumbnail">

                    <div class="card-body">

                        <h5 class="card-title" > <?php echo $candidato->Nombre ?></h5>
                        <h5 class="card-subtitle mb-2"><?php echo $candidato->Apellido ?></h5>
                        <h6 class="card-text">Partido: <?php echo ($servicepartido->GetByid($candidato->ID))->Nombre ?? 'Partido Eliminado' ?></h6>

                        <h6 class="card-text">Puesto: <?php echo ($servicepuesto->GetByid($candidato->Puesto))->Nombre  ?></h6>
                        <h6 class="card-text">Estado: <?php if ($candidato->Estado == 1) : ?>
                                <td>Activo</td>
                            <?php else : ?>
                                <td>Inactivo</td>
                            <?php endif; ?></h6>

                        <form method="post">
                            <!-- <a  class="btn btn-warning" onclick="return confirmar()">Votar</a> -->
                            <button type="submit" class="btn btn-primary">Votar</button>
                            <!-- <a href="votoD.php" class="btn btn-warning" onclick="return confirmar()">Votar</a> -->
                        </form>
                        
                    </div>

                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php endforeach; ?>
        <?php endif; ?>


    </div>
<?php endforeach; ?>
<br>
<?php printFooter(true); ?>
<script type="text/javascript">
    function confirmar() {
        var respuesta = confirm("Esta seguro de votar por este candidato?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>