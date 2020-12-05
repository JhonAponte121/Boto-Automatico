<link rel="stylesheet" href="..assents/css/stlye.css">
<?php

include "../layout/layout.php";
require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "partidoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "partido.php";

$service = new partidoservice("database");
if (isset($_GET['id'])) {

  $partidoid = $_GET['id'];
  $elemento = $service->GetByid($partidoid);

  if (
    isset($_POST['nombre']) && isset($_POST['desc'])
    && isset($_FILES['Logo_Partido'])
    && isset($_POST['estado'])
  ) {

    $actualizar = new partido();

    $actualizar->enviardatos($partidoid, $_POST['nombre'], $_FILES['Logo_Partido'], $_POST['desc'], $_POST['estado']);

    echo '<script>alert("Ciudadano actualizado")</script>';

    $service->editar($partidoid, $actualizar);


    header("location: listarpartido.php");
    exit();
  }
}
?>

<?php printHeader(true); ?>

<div class="card text-white bg-dark mb-3">
  <h5 class="card-header">Editar Partido</h5>
  <div class="card-body">
    <form enctype="multipart/form-data" action="editarpartido.php?id=<?php echo  $elemento->ID; ?>" method="POST">


      <div class="form-group">
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $elemento->Nombre; ?>" placeholder="Nombre">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="desc" value="<?php echo $elemento->Descripcion; ?>" name="desc" placeholder="Descripcion">
      </div>
      <img class="bd-placeholder-img card-img-top" src="<?php echo "imagenes/partido/" . $elemento->Logo_Partido ?>" width="100%" style=" width: 15rem" height="200" aria-label="Placeholder: Thumbnail">
      <div class="form-group">
        <input type="file" class="form-control" id="foto" name="Logo_Partido">

        <div class="form-group ">
          <input type="radio" style="width: 1rem" id="active" name="estado" value="1" <?php if($elemento->Estado) echo 'checked="checked"'?>> <label>Activo</label>
          <input type="radio" style="width: 1rem" id="inactive" name="estado" value="0" <?php if(!$elemento->Estado) echo 'checked="checked"'?>> <label>Inactivo</label>
        </div>
        <div></div>

        <a href=" listarpartido.php" class="btn btn-outline-secondary">Volver</a>&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">Guardar</button>

        <?php printFooter(true); ?>