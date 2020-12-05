<?php

class elecciones{

    public $ID; 
    public $Nombre;
    public $Fecha_de_Realizacion;
    public $Estado;
    


    private $servicio;



public function enviardatos($ID,$Nombre,$Fecha_de_Realizacion,$Estado){
    
    $this->ID=$ID;
    $this->Nombre=$Nombre;
    $this->Fecha_de_Realizacion=$Fecha_de_Realizacion;
    $this->Estado=$Estado;
     
     
}




}



?>