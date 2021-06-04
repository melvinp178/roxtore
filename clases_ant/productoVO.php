<?php
require_once('tipo_usuarioVO.php');
class usuarioVO extends tipo_usuarioVO{
var $prod_id;
var $prod_nombre;
var $prod_precio;
var $prod_stock;
var $prod_descripcion;
var $prod_talla;
var $prod_cantidad;
var $prod_descuento;
var $tius_id;
var $carr_id;

function getprod_id(){
	return $this->prod_id;
}
function setprod_id($prod_id){
	$this->prod_id = $prod_id;
}

function getprod_nombre(){
	return $this->prod_nombre;
}
function setprod_nombre($prod_nombre){
	$this->prod_nombre = $prod_nombre;
}

function getprod_precio(){
	return $this->prod_precio;
}
function setprod_precio($prod_precio){
	$this->prod_precio = $prod_precio;
}

function getprod_stock(){
	return $this->prod_stock;
}
function setprod_stock($prod_stock){
	$this->prod_stock = $prod_stock;
}

function getprod_descripcion(){
	return $this->prod_descripcion;
}
function setprod_descripcion($prod_descripcion){
	$this->prod_descripcion = $prod_descripcion;
}

function getprod_talla(){
	return $this->prod_talla;
}
function setprod_talla($prod_talla){
	$this->prod_talla = $prod_talla;
}

function getprod_cantidad(){
	return $this->prod_cantidad;
}
function setprod_cantidad($prod_cantidad){
	$this->prod_cantidad = $prod_cantidad;
}
function getprod_descuento(){
	return $this->prod_descuento;
}
function setprod_descuento($prod_descuento){
	$this->prod_descuento = $prod_descuento;
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