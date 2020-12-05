<?php

class ciudadanoservice implements Iserviciobase{
 
    private $servicio;
     private $context;
    
    public function __construct($directory){
        
         $this->servicio = new Servicio();
        $this->context = new Context($directory);
    }
    public function Getlista(){

        $listarciudadano = array();
    
        $stmt = $this->context->db->prepare("select * from ciudadanos");
        $stmt->execute();
        $result= $stmt->get_result();
    
        if($result->num_rows === 0){
            
            return $listarciudadano;
        }else{
            
            while($row = $result->fetch_object()){
                
              $ciudadano = new ciudadano();

                $ciudadano->Identidad= $row->Identidad;
                $ciudadano->Nombre= $row->Nombre;
                $ciudadano->Apellido= $row->Apellido;
                $ciudadano->Estado= $row->Estado;
                $ciudadano->Email= $row->Email;


                array_push($listarciudadano,$ciudadano);
                
            }
        }
        
    return $listarciudadano;
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
    public function añadir($entidad)
{

     $stmt = $this->context->db->prepare("insert into ciudadanos (Identidad,Nombre,Apellido,Email,Estado) Values(?,?,?,?,?)");

     $stmt->bind_param("ssssi",$entidad->Identidad,$entidad->Nombre,$entidad->Apellido,$entidad->Email,$entidad->Estado);
    
     
     $stmt->execute();
     $stmt->close();

     $ciudadanoid = $this->context->db->insert_id;


}

public function eliminar($id){
    $stmt = $this->context->db->prepare("delete from ciudadanos where Identidad = ? ");
       $stmt->bind_param("s",$id);
       $stmt->execute();
       $stmt->close();
  
  
  }
  public function GetByid($id){

    $ciudadano = new ciudadano();

 $stmt = $this->context->db->prepare("select * from ciudadanos where Identidad = ?");
 $stmt->bind_param("i",$id);
    $stmt->execute();
    $result= $stmt->get_result();

    if($result->num_rows === 0){
        
        return null;
    }else{
        
          while($row = $result->fetch_object()){
              
        $ciudadano->Identidad= $row->Identidad;
        $ciudadano->Nombre= $row->Nombre;
        $ciudadano->Apellido= $row->Apellido;
        $ciudadano->Estado= $row->Estado;
        $ciudadano->Email= $row->Email;
          }
    }
return $ciudadano; 
$stmt->close();

}
public function editar($id,$entidad){
    
    $elemento= $this->GetByid($id);
        
    $stmt = $this->context->db->prepare("update ciudadanos set Identidad = ?, nombre = ?,apellido = ?,Email= ?,Estado= ? where Identidad = ?");
    $stmt->bind_param("isssii",$entidad->Identidad,$entidad->Nombre,$entidad->Apellido,$entidad->Email
    ,$entidad->Estado,$id);
    $stmt->execute();
    $stmt->close();

   
   
    
   
}
    
}