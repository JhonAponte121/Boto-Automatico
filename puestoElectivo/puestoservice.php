<?php
include_once "puestoelectivo.php";

class puestoservice implements Iserviciobase{
 
    private $servicio;
    private $context;

    public function __construct($directory){
        $this->servicio = new Servicio();
        $this->context = new Context($directory);
    }
    public function Getlista(){

        $listarpuesto = array();
    
        $stmt = $this->context->db->prepare("SELECT * FROM puesto_electivo");
    
        $stmt->execute();
        
    
        $result= $stmt->get_result();
    
        if($result->num_rows === 0){
            // echo 'esrserserserserserser';
            return $listarpuesto;
        }else{
            
            while($row = $result->fetch_object()){
                
              $puesto = new puestoelectivo();

                $puesto->ID= $row->Id;
                $puesto->Nombre= $row->Nombre;
                $puesto->Descripcion= $row->Descripcion;
                $puesto->Estado= $row->Estado;

                array_push($listarpuesto,$puesto);
               
            }
        }
        
    return $listarpuesto;
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
    public function GetByid($id){

        $puesto = new puestoelectivo();
    
     $stmt = $this->context->db->prepare("select * from puesto_electivo where ID = ?");
     $stmt->bind_param("i",$id);
        
        $stmt->execute();
    
        $result= $stmt->get_result();
    
        if($result->num_rows === 0){
            
            return null;
        }else{
            
            while($row = $result->fetch_object()){
    
    
                
                $puesto->ID= $row->Id;
                $puesto->Nombre= $row->Nombre;
                $puesto->Descripcion= $row->Descripcion;
                $puesto->Estado= $row->Estado;

                
             
            }
        }
    return $puesto; 
    $stmt->close();
    
    }
    
    public function añadir($entidad)
{

     $stmt = $this->context->db->prepare("insert into puesto_electivo (Nombre,Descripcion,Estado) Values('$entidad->Nombre','$entidad->Descripcion',$entidad->Estado)");
     $stmt->execute();
     $stmt->close();

     $puestoid = $this->context->db->insert_id;

}

public function eliminar($id)
{
    $stmt = $this->context->db->prepare("update puesto_electivo set Estado = 0 where Id = $id ");

    $stmt->execute();
    $stmt->close();
}

  public function editar($id,$entidad){
    
    $elemento= $this->GetByid($id);
        
         $stmt = $this->context->db->prepare("UPDATE puesto_electivo set Nombre = '$entidad->Nombre',Descripcion = '$entidad->Descripcion',Estado= $entidad->Estado where Id = $id");
         $stmt->execute();
         $stmt->close();
    
        
    }
    
}