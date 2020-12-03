<?php

session_start();

if(isset($_SESSION['identidad'])){

if($_SESSION['identidad']== null){

    $_SESSION['messageAuth']="debes ingresar la cedula para votar";
    header("Location: index.php");
    exit();
} 
}else{
    $_SESSION['messageAuth']="debes ingresar la cedula para votar";
    header("Location:  index.php");
    exit();

}
?>