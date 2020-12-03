<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="script.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php 

include "../layout/layout.php";
?>


    <?php printHeader(true); ?>

    <h4>Iniciar sesion como Administrador</h4>
    <br>
    <div class="form-group">
        <input type="text" class="form-control" id="adminUser" name="adminUser" placeholder="Usuario"><br>
        <input type="password" class="form-control" id="adminPass" name="adminPass" placeholder="Contraseña">
    </div>

    <a class="btn btn-primary my-2" onclick="Validar()">Entrar</a>
    <a href="../index.php" class="btn btn-dark my-2" onclick="">Atras</a>


    <?php printFooter(true); ?>

    <script>
    function Validar() {
        var inputadmin = document.getElementById('adminUser');
        var inputpass = document.getElementById('adminPass');

        if (inputadmin.value === "admin" && inputpass.value === "user") {

            alert('Bienvenido');
            location.href = "admin.php";

        } else {
            alert('Administrador incorrecto, ponte en contacto con el servidor');
            location.reload();
        }

    }
    </script>
</body>

</html>