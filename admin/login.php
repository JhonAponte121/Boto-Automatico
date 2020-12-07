<?php 

session_start();

if (isset($_SESSION['admin_logueado'])) 
{
    header('location:/Boto-Automatico/admin/admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="script.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>

</head>

<body>
    <?php 

include "../layout/layout.php";
?>


    <?php printHeader(true); ?>

    <h4>Administrador</h4>
    <br>
    <form action="submitLogin.php" method="POST" class="form-signin">
        <?php if (isset($_SESSION['errorLogin'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <?php echo $_SESSION['errorLogin'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['errorLogin']);
        endif ?>

        <div class="form-group">
            <input type="text" class="form-control" id="adminUser" name="adminUser" placeholder="Usuario" required><br>
            <input type="password" class="form-control" id="adminPass" name="adminPass" placeholder="Contraseña" required>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

    <button class="btn btn-lg btn-dark btn-block mt-2" onclick="window.location='../index.php'">Volver al Inicio</button>

    <?php printFooter(true); ?>

</body>
</html>