<?php

class puestoelectivo{

    public $ID; 
    public $Nombre;
    public $Descripcion;
    public $Estado;
    private $servicio;
    
public function __construct(){
    
    $this->servicio= new Servicio();
}

public function enviardatos($ID,$Nombre,$Descripcion,$Estado){
    
    $this->ID=$ID;
    $this->Nombre=$Nombre;
    $this->Descripcion=$Descripcion;
     $this->Estado=$Estado;
         
}
}

?>