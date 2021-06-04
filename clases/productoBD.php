<?php
class productoBD{

public $miConexion;
function __construct($conexion){
    $this->miConexion=$conexion;

}

    
function seleccionar($prod_nombre,$nom_img)
{
    
    $sql="SELECT * FROM principal.producto WHERE prod_nombre='$prod_nombre' OR prod_imagen='$nom_img'";
    
    $this->miConexion->consulta($sql);
    $resultado=$this->miConexion->cuentaFilas();
    
    if($resultado>0)
    {
	   return true;
    }
    else
    {
	   return false;
    }
}
    
function guardar($prod_nombre,$prod_precio,$prod_imagen,$categoria,$id){
    $sql="INSERT INTO principal.producto(prod_nombre,prod_precio,categoria,prod_imagen,id_user)
         VALUES ('$prod_nombre','$prod_precio','$categoria','$prod_imagen','$id')";
    $this -> miConexion->consulta($sql);
    if($this -> miConexion->filasAfectadas()){
        return true;
    }else{
        return false;
    }
    
}
    
function seleccionarprod($categoria)
{
    
    $sql="SELECT * FROM principal.producto WHERE categoria='$categoria'";
    
    $this->miConexion->consulta($sql);
    $lista=$this->miConexion->extraerRegistroArray();
    return $lista;
}   

function contarprod($categoria)
{
    
    $sql="SELECT * FROM principal.producto WHERE categoria='$categoria'";
    
    $this->miConexion->consulta($sql);
    $resultado=$this->miConexion->cuentaFilas();
    return $resultado;
}  

function seleccionarproduser($categoria)
{
    
    $sql="SELECT * FROM principal.producto WHERE id_user='$categoria'";
    
    $this->miConexion->consulta($sql);
    $lista=$this->miConexion->extraerRegistroArray();
    return $lista;
}   

function contarproduser($categoria)
{
    
    $sql="SELECT * FROM principal.producto WHERE id_user='$categoria'";
    
    $this->miConexion->consulta($sql);
    $resultado=$this->miConexion->cuentaFilas();
    return $resultado;
} 

function eliminar($id)
{
    
    $sql = "DELETE FROM principal.producto WHERE prod_id=$id";
    $this->miConexion->consulta($sql);
}  

function consultarproduser($id){
    $sql="SELECT * FROM principal.producto WHERE prod_id=$id";
    
    $this->miConexion->consulta($sql);
    $lista=$this->miConexion->extraerRegistro();
    return $lista;
}
function guardarproducto($id,$nombre,$precio,$categoria){
    $sql="UPDATE principal.producto SET (prod_nombre,prod_precio,categoria) =
          ('$nombre','$precio','$categoria') WHERE prod_id = $id";
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