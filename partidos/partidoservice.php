<?php

require_once "partido.php";

class partidoservice implements Iserviciobase{
 
    private $servicio;
    private $context;

    public function __construct($directory){
        $this->servicio = new Servicio();
        $this->context = new Context($directory);
    }

    public function Getlista(){

        $listarpartido = array();
        $stmt = $this->context->db->prepare("SELECT * FROM partido");
    
        $stmt->execute();
        $result= $stmt->get_result();
    
        if($result->num_rows === 0){
            
            return $listarpartido;
        }else
        {
            while($row = $result->fetch_object())
            {
                
                $partido = new partido();

                $partido->ID= $row->Id;
                $partido->Nombre= $row->Nombre;
                $partido->Descripcion= $row->Descripcion;
                $partido->Logo_Partido = $row->Logo_Partido;
                $partido->Estado= $row->Estado;


                array_push($listarpartido,$partido); 
            }
        }
        
      return $listarpartido;
      $stmt->close();
    }

    public function GetByid($id)
    {
      $partido = new partido();
    
      $stmt = $this->context->db->prepare("select * from partido where Id = ?");
      $stmt->bind_param("i",$id);

      $stmt->execute();

      $result= $stmt->get_result();

      if($result->num_rows === 0)
      {
        return null;
      }
      else
      {
        while($row = $result->fetch_object())
        {
          $partido->ID= $row->Id;
          $partido->Nombre= $row->Nombre;
          $partido->Descripcion= $row->Descripcion;
          $partido->Logo_Partido= $row->Logo_Partido;
          $partido->Estado= $row->Estado;
        }
      }

      return $partido; 
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

      $stmt = $this->context->db->prepare("INSERT INTO partido (Nombre,Descripcion,Logo_Partido,Estado) Values('$entidad->Nombre','$entidad->Descripcion','$entidad->Logo_Partido',$entidad->Estado)");

      $stmt->execute();
      $stmt->close();

      $partidoid = $this->context->db->insert_id;

      if(isset($_FILES['Logo_Partido']))
      {
        $photofile=$_FILES['Logo_Partido'];

        if($photofile['error']==4)
        {
          $entidad->foto = "";
        }
        else
        {
          $typeReplace = str_replace("image/", "", $_FILES['Logo_Partido']['type']);
          $type= $photofile['type'];
          $size= $photofile['size'];
          $name= $partidoid . '.' . $typeReplace;
          $tmpname= $photofile['tmp_name'];

          $success=$this->servicio->uploadImage('imagenes/partido/',$name,$tmpname,$type,$size);

          if($success)
          {
            $stmt = $this->context->db->prepare("update partido set Logo_Partido = '$name' where Id = $partidoid ");

            $stmt->execute();
            $stmt->close();
          }
        }
      }
    }

public function eliminar($ID){
    $stmt = $this->context->db->prepare("delete from partido where Id = ? ");
  
       $stmt->bind_param("i",$ID);
       $stmt->execute();
       $stmt->close();
  
  
  }
  public function editar($id,$entidad){
    
    $elemento= $this->GetByid($id);
        
    $stmt = $this->context->db->prepare("update partido set Nombre = '$entidad->Nombre', Logo_Partido = '$entidad->Logo_Partido', Descripcion = '$entidad->Descripcion', Estado=$entidad->Estado where Id = $id");

    $stmt->execute();
    $stmt->close();

    if(isset($_FILES['Logo_Partido']))
    {

      $photofile=$_FILES['Logo_Partido'];
      
      if($photofile['error']==4)
      {
        $entidad->profilePhoto = $elemento->Logo_Partido;
      }
      else
      {
      
        $typeReplace = str_replace("image/", "", $_FILES['Logo_Partido']['type']);
        $type= $photofile['type'];
        $size=$photofile['size'];
        $name=$id . '.' . $typeReplace;
        $tmpname=$photofile['tmp_name'];

        $success=$this->servicio->uploadImage('imagenes/partido/',$name,$tmpname,$type,$size);

        if($success)
        {
          $stmt = $this->context->db->prepare("update partido set Logo_Partido = '$name' where Id = $id ");

            $stmt->execute();
            $stmt->close();
        }
      }
    }  
  }  
}