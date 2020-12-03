<?php

class userservice {
 
private $context;
    
    public function __construct($directory){
        
        $this->context = new Context($directory);
    }

   public function login($identidad){

 $stmt= $this->context->db->prepare("select * from ciudadanos where Identidad = ?");
 $stmt->bind_param("s",$identidad);
 $result= $stmt->execute();
 $result= $stmt->get_result();

if($result->num_rows === 0){

   return null; 
}else{

    $row = $result->fetch_object();
    $login= new Login();

    $login->Identidad = $row->Identidad;
    $login->Nombre = $row->Nombre;
    $login->Apellido = $row->Apellido;
    $login->Email = $row->Email;
    
    
    
    return $login;
}
 
}
}
?>