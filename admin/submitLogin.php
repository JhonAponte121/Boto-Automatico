<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $username = trim($_POST['adminUser']);
    $pass = trim($_POST['adminPass']);

    if ($username == "admin" && $pass == "user")
    {
        $_SESSION['admin_logueado'] = "admin";
        header('location:/Boto-Automatico/admin/admin.php');
    } 
    else 
    {
        $_SESSION['errorLogin'] = "El usuario o la contraseña son incorrectos.";
        header('location:/Boto-Automatico/admin/login.php');
    }
}