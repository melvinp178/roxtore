<?php
require_once('carreraVO.php');
class carreraDAO{
	var $miConexion;
	
	function __construct($conexion){
		$this->miConexion=$conexion;
	}
    
	function listarCarrera(){
		$lista=array();
		 $sql="SELECT * FROM  principal.carrera";
		$resultado=$this->miConexion->consulta($sql);
		if($resultado){
			while($row=$this->miConexion->extraerRegistro()){
				$carreraVO=new carreraVO();
				$carreraVO->setcarr_id($row['carr_id']);
				$carreraVO->setcarr_nombre($row['carr_nombre']);
								
				$lista[]=$carreraVO;
			
			}
		}
		
		return $lista;
	}
}
?>








































