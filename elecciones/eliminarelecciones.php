<?php 

  require_once 'elecciones.php';
  require_once '../database/servicio.php';
  require_once '../database/Iserviciobase.php';
  require_once '../database/FileHandler.php';
  require_once '../database/JsonFileHandler.php';
  require_once '../database/Context.php';
  require_once 'eleccionservice.php';


  $service = new eleccionservice("database");


  $id=isset($_GET['id']);
  
  if($id){
  
      $eleccionid=$_GET['id'];
      $service->eliminar($eleccionid);
  
  }
  
  header("location: listarelecciones.php");
  exit();
  
  ?> 