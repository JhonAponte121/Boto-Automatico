<?php

class elecciones{

    public $ID; 
    public $Nombre;
    public $Fecha;
    public $Estado;
  
    private $servicio;

	public function enviardatos($ID,$Nombre,$Fecha,$Estado){
	    
	    $this->ID=$ID;
	    $this->Nombre=$Nombre;
	    $this->Fecha=$Fecha;
	    $this->Estado=$Estado;   
	}
}



?>