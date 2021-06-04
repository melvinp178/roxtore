<?php
require_once('proveedorVO.php');

class proveedorDAO{
	var $miConexion;
	
	function __construct($conexion){
		$this->miConexion=$conexion;
	}
    
	function consultarproveedor($usua_correo,$usua_clave){
		$lista=array();
		 $sql="SELECT * FROM  principal.proveedor WHERE usua_correo='$usua_correo'
		AND usua_clave='$usua_clave'";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$proveedorVO=new proveedorVO();
				$proveedorVO->setcodigo_proveedor($row['codigo_proveedor']);
				$proveedorVO->setnombre($row['nombre']);
				$proveedorVO->settelefono($row['telefono']);
				
				$proveedorVO->settius_id($row['tius_id']);
				$proveedorVO->setcarr_id($row['carr_id']);
				
				$lista[]=$proveedorVO;
			
			}
		}
		
		return $lista;
	}
	
	function listarProveedores(){
	
		$lista=array();
		 $sql="SELECT * FROM principal.proveedor";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			
			while($row=$this->miConexion->extraerRegistro()){
			   $proveedorVO = new proveedorVO();
				$proveedorVO->setcodigo_proveedor($row['codigo_proveedor']);
				$proveedorVO->setnombre($row['nombre']);
				$proveedorVO->settelefono($row['telefono']);
				
				$lista[]=$proveedorVO;
			
			}
		}
		
		return $lista;
	
	} 
	
		function seleccionarProveedor($proveedorVO){
	
		$lista=array();
	    $sql="SELECT * FROM principal.proveedor where codigo_proveedor=".$proveedorVO->getcodigo_proveedor();
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			$proveedorVO = new proveedorVO();
			while($row=$this->miConexion->extraerRegistro()){
				$proveedorVO->setcodigo_proveedor($row['codigo_proveedor']);
				$proveedorVO->setnombre($row['nombre']);
				$proveedorVO->settelefono($row['telefono']);
				
				$lista[]=$proveedorVO;
			
			}
		}
		
		return $lista;
	
	} 
	function eliminar($proveedorVO){
		$sql="DELETE FROM principal.proveedor WHERE codigo_proveedor=".$proveedorVO->getcodigo_proveedor();
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
	
	function insertar($proveedorVO){
	//$proveedorVO = new proveedorVO();
		echo $sql="INSERT INTO principal.proveedor(
		 nombre,telefono) VALUES (
		 '".$proveedorVO->getnombre()."','".$proveedorVO->gettelefono()."')";
		
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
	function modificar($proveedorVO){
		$sql="UPDATE principal.proveedor  SET
		  nombre='".$proveedorVO->getnombre()."'
		 ,telefono='".$proveedorVO->gettelefono()."'	
		WHERE codigo_proveedor=".$proveedorVO->getcodigo_proveedor()."";
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
}
?>
























































