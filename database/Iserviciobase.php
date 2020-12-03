<?php

interface Iserviciobase{

    public function GetByid($id);
    public function añadir($entidad);
    public function Getlista();
    public function GetlistaD();
    public function editar($id,$endidad);
    public function eliminar($id);
    public function GetlistaA();
    public function GetlistaP();
    public function GetlistaS();

    
}



?>