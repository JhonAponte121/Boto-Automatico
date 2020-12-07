<?php

class eleccionservice implements Iserviciobase{
 
    private $servicio;
    
    public function __construct($directory){
        
        $this->context = new Context($directory);
    }
    public function eliminar($id){}
    public function GetByid($id){}
    public function añadir($entidad){}
    public function editar($id,$endidad){}
    
    public function Getlista(){

        $listarvotos = array();
    
        $stmt = $this->context->db->prepare("select * from elecciones");
    
        $stmt->execute();
        
    
        $result= $stmt->get_result();
    
        if($result->num_rows === 0){
            
            return $listarvotos;
        }else{
            
            while($row = $result->fetch_object()){
                
              $eleccion = new elecciones();
    
                
                $eleccion->ID= $row->Id;
                $eleccion->Nombre= $row->Nombre;
                $eleccion->Fecha_de_Realizacion= $row->Fecha_de_Realizacion;
                $eleccion->Estado= $row->Estado;
               


                array_push($listarvotos,$eleccion);
                
            }
        }
        
    return $listarvotos;
    $stmt->close();
    }
}