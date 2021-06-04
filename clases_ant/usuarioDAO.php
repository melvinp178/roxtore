<?php
require_once('usuarioVO.php');
require_once('tipo_usuarioDAO.php');
class usuarioDAO extends tipo_usuarioDAO{
	var $miConexion;
	
	function __construct($conexion){
		$this->miConexion=$conexion;
	}
    
	function consultarUsuario($usua_correo,$usua_clave){
		$lista=array();
		 $sql="SELECT * FROM  principal.usuario WHERE usua_correo='$usua_correo'
		AND usua_clave='$usua_clave'";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$usuarioVO=new usuarioVO();
				$usuarioVO->setusua_id($row['usua_id']);
				$usuarioVO->setusua_nombre($row['usua_nombre']);
				$usuarioVO->setusua_correo($row['usua_correo']);
				$usuarioVO->setusua_clave($row['usua_clave']);
				$usuarioVO->setusua_tel($row['usua_tel']);
				$usuarioVO->settius_id($row['tius_id']);
				$usuarioVO->setcarr_id($row['carr_id']);
				
				$lista[]=$usuarioVO;
			
			}
		}
		
		return $lista;
	}
	
	function listarUsuarios(){
	
		$lista=array();
		 $sql="SELECT u.*,tu.tius_nombre FROM principal.usuario u,principal.tipo_usuario tu
			   WHERE u.tius_id=tu.tius_id";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$usuarioVO=new usuarioVO();
				$usuarioVO->setusua_id($row['usua_id']);
				$usuarioVO->setusua_nombre($row['usua_nombre']);
				$usuarioVO->setusua_correo($row['usua_correo']);
				$usuarioVO->setusua_clave($row['usua_clave']);
				$usuarioVO->setusua_tel($row['usua_tel']);
				$usuarioVO->settius_id($row['tius_id']);
				$usuarioVO->setcarr_id($row['carr_id']);
				$usuarioVO->settius_nombre($row['tius_nombre']);
				
				$lista[]=$usuarioVO;
			
			}
		}
		
		return $lista;
	
	} 
	
		function seleccionarUsuario($usuarioVO){
	
		$lista=array();
		 $sql="SELECT u.*,tu.tius_nombre FROM principal.usuario u,principal.tipo_usuario tu
			   WHERE u.tius_id=tu.tius_id AND u.usua_id=".$usuarioVO->getusua_id();
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$usuarioVO=new usuarioVO();
				$usuarioVO->setusua_id($row['usua_id']);
				$usuarioVO->setusua_nombre($row['usua_nombre']);
				$usuarioVO->setusua_correo($row['usua_correo']);
				$usuarioVO->setusua_clave($row['usua_clave']);
				$usuarioVO->setusua_tel($row['usua_tel']);
				$usuarioVO->settius_id($row['tius_id']);
				$usuarioVO->setcarr_id($row['carr_id']);
				$usuarioVO->settius_nombre($row['tius_nombre']);
				
				$lista[]=$usuarioVO;
			
			}
		}
		
		return $lista;
	
	} 
	function eliminar($usuarioVO){
		$sql="DELETE FROM principal.usuario WHERE usua_id=".$usuarioVO->getusua_id();
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
	
	function insertar($usuarioVO){
		$sql="INSERT INTO principal.usuario  (
		 usua_nombre,usua_correo,usua_clave,usua_tel,
		tius_id,carr_id ) VALUES (
		 '".$usuarioVO->getusua_nombre()."','".$usuarioVO->getusua_correo()."'
		,'".$usuarioVO->getusua_clave()."','".$usuarioVO->getusua_tel()."',
		".$usuarioVO->gettius_id().",".$usuarioVO->getcarr_id().")";
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
			return true;
		}else{
			return false;
		}
	}
	function modificar($usuarioVO){
		$sql="UPDATE principal.usuario  SET
		  usua_nombre='".$usuarioVO->getusua_nombre()."'
		 ,usua_correo='".$usuarioVO->getusua_correo()."'
		 ,usua_clave='".$usuarioVO->getusua_clave()."'
		 ,usua_tel='".$usuarioVO->getusua_tel()."',
		 tius_id=".$usuarioVO->gettius_id().",
		 carr_id=".$usuarioVO->getcarr_id()."
		WHERE usua_id=".$usuarioVO->getusua_id()."
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













































































