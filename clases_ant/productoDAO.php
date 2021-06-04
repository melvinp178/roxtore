<?php
require_once('productoVO.php');
require_once('tipo_usuarioDAO.php');
class usuarioDAO extends tipo_usuarioDAO{
	var $miConexion;
	
	function __construct($conexion){
		$this->miConexion=$conexion;
	}
    
	function consultarProducto($usua_correo,$usua_clave){
		$lista=array();
		 $sql="SELECT * FROM  principal.producto WHERE usua_correo='$usua_correo'
		AND usua_clave='$usua_clave'";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$productoVO=new productoVO();
				$productoVO->setprod_id($row['prod_id']);
				$productoVO->setprod_nombre($row['prod_nombre']);
				$productoVO->setprod_precio($row['prod_precio']);
				$productoVO->setprod_stock($row['prod_stock']);
				$productoVO->setprod_descripcion($row['prod_descripcion']);
				$productoVO->setprod_talla($row['prod_talla']);
				$productoVO->setprod_cantidad($row['prod_cantidad']);
				$productoVO->setprod_descuento($row['prod_descuento']);
				$productoVO->settius_id($row['tius_id']);
				$productoVO->setcarr_id($row['carr_id']);
				
				$lista[]=$productoVO;
			
			}
		}
		
		return $lista;
	}
	
	function listarProducto(){
	
		$lista=array();
		 $sql="SELECT u.*,tu.tius_nombre FROM principal.producto u,principal.tipo_usuario tu
			   WHERE u.tius_id=tu.tius_id";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$productoVO=new productoVO();
				$productoVO->setprod_id($row['prod_id']);
				$productoVO->setprod_nombre($row['prod_nombre']);
				$productoVO->setprod_precio($row['prod_precio']);
				$productoVO->setprod_stock($row['prod_stock']);
				$productoVO->setprod_descripcion($row['prod_descripcion']);
				$productoVO->setprod_talla($row['prod_talla']);
				$productoVO->setprod_cantidad($row['prod_cantidad']);
				$productoVO->setprod_descuento($row['prod_descuento']);
				$productoVO->settius_id($row['tius_id']);
				$productoVO->setcarr_id($row['carr_id']);
				
				$lista[]=$productoVO;
			
			}
		}
		
		return $lista;
	
	} 
	
		function seleccionarProducto($productoVO){
	
		$lista=array();
		 $sql="SELECT u.*,tu.tius_nombre FROM principal.producto u,principal.tipo_usuario tu
			   WHERE u.tius_id=tu.tius_id AND u.usua_id=".$productoVO->getprod_id();
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$productoVO=new productoVO();
				$productoVO->setprod_id($row['prod_id']);
				$productoVO->setprod_nombre($row['prod_nombre']);
				$productoVO->setprod_precio($row['prod_precio']);
				$productoVO->setprod_stock($row['prod_stock']);
				$productoVO->setprod_descripcion($row['prod_descripcion']);
				$productoVO->setprod_talla($row['prod_talla']);
				$productoVO->setprod_cantidad($row['prod_cantidad']);
				$productoVO->setprod_descuento($row['prod_descuento']);
				$productoVO->settius_id($row['tius_id']);
				$productoVO->setcarr_id($row['carr_id']);
				
				$lista[]=$productoVO;
			
			}
		}
		
		return $lista;
	
	} 
	function eliminar($productoVO){
		$sql="DELETE FROM principal.producto WHERE usua_id=".$productoVO->getprod_id();
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
	
	function insertar($productoVO){
		$sql="INSERT INTO principal.producto  (
		 prod_nombre,prod_precio,prod_stock,prod_descripcion,prod_talla,prod_cantidad, prod_descuento,
		tius_id,carr_id ) VALUES (
		 '".$productoVO->getprod_nombre()."','".$productoVO->getprod_precio()."'
		,'".$productoVO->getprod_stck()."','".$productoVO->getprod_descripcion()."','".$productoVO->getprod_talla()."','".$productoVO->getprod_cantidad()."','".$productoVO->getprod_descuento()."',".$productoVO->gettius_id().",".$productoVO->getcarr_id().")";
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
	function modificar($productoVO){
		$sql="UPDATE principal.producto SET
		  prod_nombre='".$productoVO->getprod_nombre()."'
		 ,prod_precio='".$productoVO->getprod_precio()."'
		 ,prod_stock='".$productoVO->getprod_stock()."'
		 ,prod_descripcion='".$productoVO->getprod_descripcion()."'
		 ,prod_talla='".$productoVO->getprod_talla()."'
		 ,prod_cantidad='".$productoVO->getprod_cantidad()."'
		  ,prod_descuento='".$productoVO->getprod_descuento()."'
		 ,tius_id=".$productoVO->gettius_id()."
		 ,carr_id=".$productoVO>getcarr_id()."
		WHERE prod_id=".$productoVO->getprod_id()."
		";
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
}
?>
























































