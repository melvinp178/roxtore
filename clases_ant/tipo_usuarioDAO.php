<?php
require_once('tipo_usuarioVO.php');
class tipo_usuarioDAO{
	var $miConexion;
	
	function __construct($conexion){
		$this->miConexion=$conexion;
	}
    
	function listarTipoUsuario(){
		$lista=array();
		 $sql="SELECT * FROM  principal.tipo_usuario";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$tipo_usuarioVO=new tipo_usuarioVO();
				$tipo_usuarioVO->settius_id($row['tius_id']);
				$tipo_usuarioVO->settius_nombre($row['tius_nombre']);
								
				$lista[]=$tipo_usuarioVO;
			
			}
		}
		
		return $lista;
	}
}
?>








































