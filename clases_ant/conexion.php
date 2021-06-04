<?php
class Conexion{
	private $conexion;
	private $respuesta;
	function __construct(){
		$host="localhost";//127.0.0.1
		$dbname="universidad";
		$user="admin";
		$password="admin2016";
		$port="5432";
		$this->conexion=pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port") or die("No hay conexion con la BD");
		$this->consulta('BEGIN');
	}
	function consulta($sql){
		return $this->respuesta=pg_query($this->conexion,$sql);
	}
	function extraerRegistro(){
		if($fila=pg_fetch_array($this->respuesta)){				
			return $fila;
		}else{		
			return false;
		}		
	}
	function filasAfectadas(){
		if(pg_affected_rows($this->respuesta)){
			return true;//afecto
		}else{
			return false;//no afecto
		}
	} 
	
	
	function cerrar(){
		pg_close($this->conexion);
	}
	
	function confirmar(){
		$this->consulta('COMMIT');
		$this->cerrar();
	}
	function revertir(){
		$this->consulta('ROLLBACK');
		$this->cerrar();
	}
	
}
?>



































