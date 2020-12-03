<?php

class partido{

    public $ID; 
    public $Nombre;
    public $Descripcion;
    public $Logo_Partido;
    public $Estado;
    private $servicio;

public function __construct(){
    
    $this->servicio= new Servicio();
}

public function enviardatos($ID,$Nombre, $Logo_Partido, $Descripcion,$Estado){
    
    $this->ID=$ID;
    $this->Nombre=$Nombre;
    $this->Descripcion=$Descripcion;
    $this->Logo_Partido=$Logo_Partido;
    $this->Estado=$Estado;
    
     
}




}


?>