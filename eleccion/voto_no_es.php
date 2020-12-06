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

$islogged = false;
if (isset($_SESSION['identidad']) && $_SESSION['identidad'] != null) {
    $identidad = json_decode($_SESSION['identidad']);
    $islogged = true;
}

$service = new candidatoservice("../database");
$listarcandidato = $service->GetlistaA();

$servicepuesto = new puestoservice("database");
$listarpuesto = $servicepuesto->Getlista();

echo "<script>
                alert('Se Guardaron Correctamente Sus Votos');
                window.location= '../index.php'
    </script>";
?>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-10%">
            <div class="inner">

            </div>
            <?php printHeader(true); ?>

            <?php foreach ($listarpuesto as $puesto) : ?>
                <h3 class="font-weight-bold"><?php echo $puesto->Nombre ?></h3>
                <br>
                <div class="row">
                    <?php foreach ($service->GetByid($puesto->ID) as $candidato) : ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;

                        <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
                            <img class="bd-placeholder-img card-img-top" src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->Foto ?>" width="100%" height="150" role="img" aria-label="Placeholder: Thumbnail">

                            <div class="card-body">

                                <h5 class="card-title"> <?php echo $candidato->Nombre ?></h5>
                                <h5 class="card-subtitle mb-2"><?php echo $candidato->Apellido ?></h5>
                                <h6 class="card-text">Partido: <?php if ($candidato->Partido == 1) : ?>
                                        <td>PLD</td>
                                    <?php else : ?>
                                        <td>PRD</td>
                                    <?php endif; ?></h6>
                                <h6 class="card-text">Puesto: <?php if ($candidato->Puesto == 4) : ?>
                                        <td>Alcalde</td>

                                    <?php endif; ?></h6>
                                <h6 class="card-text">Estado: <?php if ($candidato->Estado == 1) : ?>

                                        <td>Activo</td>
                                    <?php else : ?>
                                        <td>Inactivo</td>
                                    <?php endif; ?></h6>
                                <a href="../index.php" name="selectedCandidate" class="btn btn-warning" onclick="return confirmar()">Votar</a>
                            </div>

                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php endforeach; ?>
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



            <!--  -->
            <!--  -->
            <!--  -->
            <!-- votoD -->
            <!--  -->
            <!--  -->
            <!--  -->
            <!-- 

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

$islogged = false;
if (isset($_SESSION['identidad']) && $_SESSION['identidad'] != null) {
    $identidad = json_decode($_SESSION['identidad']);
    $islogged = true;
}

$service = new candidatoservice("../database");

$listarcandidato = $service->GetlistaD();


?>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-10%">
            <div class="inner">

            </div>
            <?php printHeader(true); ?>






            <h3 class="font-weight-bold">Diputados</h3>
            <br>


            <div class="row">

                <?php foreach ($listarcandidato as $candidato) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
                    <img class="bd-placeholder-img card-img-top"
                        src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->Foto ?>" width="100%"
                        height="150" role="img" aria-label="Placeholder: Thumbnail">

                    <div class="card-body">

                        <h5 class="card-title"> <?php echo $candidato->Nombre ?></h5>
                        <h5 class="card-subtitle mb-2"><?php echo $candidato->Apellido ?></h5>
                        <h6 class="card-text">Partido: <?php if ($candidato->Partido == 1) : ?>
                            <td>PLD</td>
                            <?php else : ?>
                            <td>PRD</td>
                            <?php endif; ?></h6>
                        <h6 class="card-text">Puesto: <?php if ($candidato->Puesto == 2) : ?>
                            <td>Diputado</td>

                            <?php endif; ?></h6>
                        <h6 class="card-text">Estado: <?php if ($candidato->Estado == 1) : ?>

                            <td>Activo</td>
                            <?php else : ?>
                            <td>Inactivo</td>
                            <?php endif; ?></h6>
                        <a href="votoS.php" class="btn btn-warning" onclick="return confirmar()">Votar</a>
                    </div>

                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <?php endforeach; ?>
            </div>
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
            </script> -->








            <!--  -->
            <!--  -->
            <!--  -->
            <!-- VOTO S -->
            <!--  -->
            <!--  -->
            <!--  -->
            
            <!-- <header>
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
require_once "../database/Servicio.php";
require_once "../database/Iserviciobase.php";
require_once "../candidatos/candidatoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "../candidatos/candidato.php";

$islogged=false;
      if(isset($_SESSION['identidad']) && $_SESSION['identidad']!=null){
$identidad=json_decode($_SESSION['identidad']);
$islogged=true;

      }

$service = new candidatoservice("../database");

$listarcandidato = $service->GetlistaS();


?>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-10%">
            <div class="inner">

            </div>
            <?php printHeader(true); ?>
            <h3 class="font-weight-bold">Senadores</h3>

            <br>


            <div class="row">

                <?php foreach ($listarcandidato as $candidato) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;

                <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
                    <img class="bd-placeholder-img card-img-top"
                        src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->Foto ?>" width="100%"
                        height="150" role="img" aria-label="Placeholder: Thumbnail">

                    <div class="card-body">

                        <h5 class="card-title"> <?php echo $candidato->Nombre?></h5>
                        <h5 class="card-subtitle mb-2"><?php echo $candidato->Apellido?></h5>
                        <h6 class="card-text">Partido: <?php if ($candidato->Partido == 1): ?>
                            <td>PLD</td>
                            <?php else: ?>
                            <td>PRD</td>
                            <?php endif; ?></h6>
                        <h6 class="card-text">Puesto: <?php if ($candidato->Puesto == 3): ?>
                            <td>Senador</td>

                            <?php endif; ?></h6>
                        <h6 class="card-text">Estado: <?php if ($candidato->Estado == 1): ?>

                            <td>Activo</td>
                            <?php else: ?>
                            <td>Inactivo</td>
                            <?php endif; ?></h6>
                        <a href="votoA.php" class="btn btn-warning" onclick="return confirmar()">Votar</a>
                    </div>

                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <?php endforeach; ?>
            </div>
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
            </script> -->



