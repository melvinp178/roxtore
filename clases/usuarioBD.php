<?php
class usuarioBD{


public $miConexion;
function __construct($conexion){
    $this->miConexion=$conexion;

}
function login($correo, $clave){
$lista=array();
$sql="SELECT * FROM principal.usuarios
       WHERE usua_correo='$correo'
	  
	   AND usua_clave='$clave'";
	   $this->miConexion->consulta($sql);
	   $resultado=$this->miConexion->cuentaFilas();
	   if($resultado>0){
	   $lista=$this->miConexion->extraerRegistro();
	   }
	   else{
	   $lista=null;
	   }
	   return $lista;
}
    
function seleccionar($documento)
{
    
    $sql="SELECT * FROM principal.usuarios WHERE usua_id= ".$documento." ";
    
    $this->miConexion->consulta($sql);
    $lista=$this->miConexion->extraerRegistro();
    return $lista;
}
    
function guardar($nombre1, $nombre2, $documento, $apellido1, $apellido2, $correo, $clave, $telefono, $ciudad, $fnacimiento){
    $sql="INSERT INTO principal.usuarios(nombre1,nombre2,documento,apellido1,apellido2,usua_correo,usua_clave,usua_telefono,ciudad,f_nacimiento)
         VALUES ('$nombre1','$nombre2','$documento','$apellido1','$apellido2','$correo','$clave','$telefono','$ciudad','$fnacimiento')";
    $this -> miConexion->consulta($sql);
    if($this -> miConexion->filasAfectadas()){
        return true;
    }else{
        return false;
    }
    
}

function guardaruser($nombre1, $nombre2, $documento, $apellido1, $apellido2, $correo, $clave, $telefono, $id){
    $sql="UPDATE principal.usuarios SET (nombre1,nombre2,documento,apellido1,apellido2,usua_correo,usua_clave,usua_telefono) =
          ('$nombre1','$nombre2','$documento','$apellido1','$apellido2','$correo','$clave','$telefono') WHERE usua_id = ".$id."";
    $this -> miConexion->consulta($sql);
    if($this -> miConexion->filasAfectadas()){
        return true;
    }else{
        return false;
    }
    
}
    
   

    
}
	   
	//OR usuario ='$correo'   
?> 