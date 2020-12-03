<?php

class ciudadano{

    public $Identidad; 
    public $Nombre;
    public $Apellido;
    public $Estado;
    public $Email;

    private $servicio;

public function __construct(){
    
    $this->servicio= new Servicio();
}

public function enviardatos($Identidad,$Nombre,$Apellido,$Email,$Estado){
    
    $this->Identidad=$Identidad;
    $this->Nombre=$Nombre;
    $this->Apellido=$Apellido;
     $this->Email=$Email;
     $this->Estado=$Estado;
     
     
}




}



?>