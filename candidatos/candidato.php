<?php

class candidato{

    public $ID;
    public $Nombre;
    public $Apellido;
    public $Partido;
    public $Puesto;
    public $Estado;
    public $Foto;
    public $voto;
    private $servicio;
    
public function __construct(){
    
    $this->servicio= new Servicio();
}

public function enviardatos($ID,$Nombre,$Apellido,$Partido,$Puesto,$Estado,$voto){
     
     $this->ID=$ID;
     $this->Nombre=$Nombre;
     $this->Apellido=$Apellido;
     $this->Partido=$Partido;
     $this->Puesto=$Puesto;
     $this->Estado=$Estado;
     $this->voto=$voto;

     
}




}



?>