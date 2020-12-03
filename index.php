<?php 

include "layout/layout.php";
require_once "database/FileHandler.php";
require_once "database/JsonFileHandler.php";
require_once "database/Context.php";
require_once "database/indexlog.php";
require_once "database/userservice.php";

$result = null;
$message = "";

session_start();

$messageAuth=isset($_SESSION['messageAuth']) ? $_SESSION['messageAuth'] :"";
$_SESSION['messageAuth']="";

$service = new userservice("database");

if(isset($_POST['identidad'])){

    $result = $service->login($_POST['identidad']);

    if($result != null){
        
$_SESSION['identidad']= json_encode($result);

header("Location: eleccion/votoP.php");
exit();
        
    }else{

        $message="cedula incorrecta o no esta registrado/as";
    }
}

?>

<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-10%">
            <div class="inner">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="admin/login.php">Iniciar Como Administrador</a>

                </nav>
            </div>

            <?php printHeader(); ?>
            <?php if($messageAuth != ""):?>

            <div class="alert alert-warning">
                <?= $messageAuth ?>
            </div>
            <?php endif;?>
            <form action="index.php" method="POST" class="form-signin">
                <?php if($message !=""): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$message;?>
                </div>
                <?php endif;?>

                <div class=" form-group">
                    <input type="text" class="form-control" required="" id="identidad" name="identidad"
                        placeholder="Coloque su Documento de Identidad">
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
            </form>

            <?php printFooter(); ?>