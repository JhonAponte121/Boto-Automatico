<?php 

require_once 'puestoelectivo.php';
require_once '../database/servicio.php';
require_once '../database/Iserviciobase.php';
require_once '../database/FileHandler.php';
require_once '../database/JsonFileHandler.php';
require_once '../database/Context.php';
require_once 'puestoservice.php';
require_once '../candidatos/candidatoservice.php';


$service = new puestoservice("database");
$servicecandidato = new candidatoservice("database");

$id=isset($_GET['id']);

if($id){

    $puestoid=$_GET['id'];
    $service->eliminar($puestoid);
    $servicecandidato->eliminarPorPuesto($puestoid);
}

header("location: listarpuesto.php");
exit();

?>