<?php 

require_once 'partido.php';
require_once '../database/servicio.php';
require_once '../database/Iserviciobase.php';
require_once '../database/FileHandler.php';
require_once '../database/JsonFileHandler.php';
require_once '../database/Context.php';
require_once 'partidoservice.php';
require_once '../candidatos/candidatoservice.php';

$service = new partidoservice("database");
$servicecandidato = new candidatoservice("database");

$id=isset($_GET['id']);

if($id){

  $partidoid=$_GET['id'];
  $service->eliminar($partidoid);
  $servicecandidato->eliminarPorPartido($partidoid);
}

header("location: listarpartido.php");
exit();

?>