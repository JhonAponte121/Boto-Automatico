<?php

class login{

public $identidad;
public $nombre;
public $apellido;
public $email;

public function __construct(){

}

public function initdata($identidad,$nombre,$apellido,$email){
    
    $this->identidad=$identidad;
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->email=$email;

} 

}
    
?>