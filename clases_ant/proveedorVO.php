<?php

class proveedorVO{
var $codigo_proveedor;
var $nombre;
var $telefono;

var $carr_id;

function getcodigo_proveedor(){
	return $this->codigo_proveedor;
}
function setcodigo_proveedor($codigo_proveedor){
	$this->codigo_proveedor = $codigo_proveedor;
}

function getnombre(){
	return $this->nombre;
}
function setnombre($nombre){
	$this->nombre = $nombre;
}



function gettelefono(){
	return $this->telefono;
}
function settelefono($telefono){
	$this->telefono = $telefono;
}



function getcarr_id(){
	return $this->carr_id;
}
function setcarr_id($carr_id){
	$this->carr_id = $carr_id;
}
}
?>
