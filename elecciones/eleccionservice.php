<?php

class eleccionservice implements Iserviciobase{
 
    private $servicio;
    
    public function __construct($directory){
        
        $this->context = new Context($directory);
    }

    public function eliminar($id){
        $stmt = $this->context->db->prepare("update elecciones set Estado = 0 where Id = $id ");

        $stmt->execute();
        $stmt->close();
    }

    public function GetByid($id)
    {
        $eleccion = new elecciones();
    
        $stmt = $this->context->db->prepare("select * from elecciones where Id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
    
        $result= $stmt->get_result();
    
        if($result->num_rows === 0)
        {
            return null;
        }
        else
        {
            
            while($row = $result->fetch_object()){
    
                $eleccion->ID= $row->Id;
                $eleccion->Nombre= $row->Nombre;
                $eleccion->Fecha = $row->Fecha;
                $eleccion->Estado= $row->Estado;
            }
        }

        return $eleccion; 
        $stmt->close();

    }

    public function añadir($entidad){

        $stmt = $this->context->db->prepare("insert into elecciones (Nombre,Fecha,Estado) Values('$entidad->Nombre','$entidad->Fecha',$entidad->Estado)");

        if(!$stmt->execute()) echo "". $stmt->error;
        $stmt->close();
    }


    public function editar($id,$entidad){

        $elemento= $this->GetByid($id);

        $stmt = $this->context->db->prepare("update elecciones set Nombre = '$entidad->Nombre', Fecha = '$entidad->Fecha', Estado= $entidad->Estado where Id = $id");
        
        $stmt->execute();
        $stmt->close();
    }
    
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
                $eleccion->Fecha= $row->Fecha;
                $eleccion->Estado= $row->Estado;
               
                array_push($listarvotos,$eleccion);
                
            }
        }
        
    return $listarvotos;
    $stmt->close();
    }

    public function GetlistaD(){

    $listarcandidato = array();

    $stmt = $this->context->db->prepare("select * from candidatos where puesto = 2");
    $stmt->execute();
    $result= $stmt->get_result();

    if($result->num_rows === 0){
        
        return $listarcandidato;
    }else{
        
        while($row = $result->fetch_object()){
            
          $candidato = new candidato();

            $candidato->ID= $row->Id;
            $candidato->Nombre= $row->Nombre;
            $candidato->Apellido= $row->Apellido;
            $candidato->Partido= $row->Partido;
            $candidato->Puesto= $row->Puesto;
            $candidato->Foto= $row->Foto;
            $candidato->Estado= $row->Estado;

            array_push($listarcandidato,$candidato); 
        }
    }
    
return $listarcandidato;
$stmt->close();

}

public function GetlistaS(){

    $listarcandidato = array();

    $stmt = $this->context->db->prepare("select * from candidatos where puesto = 3");
    $stmt->execute();
    $result= $stmt->get_result();

    if($result->num_rows === 0){
        
        return $listarcandidato;
    }else{
        
        while($row = $result->fetch_object()){
            
          $candidato = new candidato();

            $candidato->ID= $row->Id;
            $candidato->Nombre= $row->Nombre;
            $candidato->Apellido= $row->Apellido;
            $candidato->Partido= $row->Partido;
            $candidato->Puesto= $row->Puesto;
            $candidato->Foto= $row->Foto;
            $candidato->Estado= $row->Estado;

            array_push($listarcandidato,$candidato); 
        }
    }
    
return $listarcandidato;
$stmt->close();

}
public function GetlistaA(){

    $listarcandidato = array();

    $stmt = $this->context->db->prepare("select * from candidatos where puesto = 4");
    $stmt->execute();
    $result= $stmt->get_result();

    if($result->num_rows === 0){
        
        return $listarcandidato;
    }else{
        
        while($row = $result->fetch_object()){
            
          $candidato = new candidato();

            $candidato->ID= $row->Id;
            $candidato->Nombre= $row->Nombre;
            $candidato->Apellido= $row->Apellido;
            $candidato->Partido= $row->Partido;
            $candidato->Puesto= $row->Puesto;
            $candidato->Foto= $row->Foto;
            $candidato->Estado= $row->Estado;

            array_push($listarcandidato,$candidato); 
        }
    }
    
return $listarcandidato;
$stmt->close();

}
    public function GetlistaP(){

        $listarcandidato = array();

        $stmt = $this->context->db->prepare("select * from candidatos where Puesto = 1");
        $stmt->execute();
        $result= $stmt->get_result();

        if($result->num_rows === 0){
            
            return $listarcandidato;
        }else{
            
            while($row = $result->fetch_object()){
                
              $candidato = new candidato();

                $candidato->ID= $row->Id;
                $candidato->Nombre= $row->Nombre;
                $candidato->Apellido= $row->Apellido;
                $candidato->Partido= $row->Partido;
                $candidato->Puesto= $row->Puesto;
                $candidato->Foto= $row->Foto;
                $candidato->Estado= $row->Estado;

                array_push($listarcandidato,$candidato); 
            }
        }
        
    return $listarcandidato;
    $stmt->close();

    }
}