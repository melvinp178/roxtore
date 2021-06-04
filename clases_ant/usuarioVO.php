<?php
require_once('tipo_usuarioVO.php');
class usuarioVO extends tipo_usuarioVO{
var $usua_id;
var $usua_nombre;
var $usua_correo;
var $usua_clave;
var $usua_tel;
var $tius_id;
var $carr_id;

function getusua_id(){
	return $this->usua_id;
}
function setusua_id($usua_id){
	$this->usua_id = $usua_id;
}

function getusua_nombre(){
	return $this->usua_nombre;
}
function setusua_nombre($usua_nombre){
	$this->usua_nombre = $usua_nombre;
}

function getusua_correo(){
	return $this->usua_correo;
}
function setusua_correo($usua_correo){
	$this->usua_correo = $usua_correo;
}

function getusua_clave(){
	return $this->usua_clave;
}
function setusua_clave($usua_clave){
	$this->usua_clave = $usua_clave;
}

function getusua_tel(){
	return $this->usua_tel;
}
function setusua_tel($usua_tel){
	$this->usua_tel = $usua_tel;
}

function gettius_id(){
	return $this->tius_id;
}
function settius_id($tius_id){
	$this->tius_id = $tius_id;
}

function getcarr_id(){
	return $this->carr_id;
}
function setcarr_id($carr_id){
	$this->carr_id = $carr_id;
}
}
?>
