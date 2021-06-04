<?php
session_start();
require_once('../clases/conexion.php'); 
require_once('../clases/productoBD.php');
	
	error_reporting(E_ALL ^ E_WARNING);

	$nombre_img = $_FILES['imagen']['name'];
    $directorio = $_SERVER['DOCUMENT_ROOT'].'/goshop/images/';
	

$conexion= new conexion();
$productoBD=new productoBD($conexion);
$res=$productoBD->seleccionar($_POST['prod_nombre'],$nombre_img);

if($res)
{
     echo '<script> alert("El Producto ó su respectiva imagen ya existe")</script>';
     echo '<script> window.location="g_prducto.php"</script>';
    
}
else
{
	$res1=$productoBD->guardar($_POST['prod_nombre'],$_POST['prod_precio'],$nombre_img,$_POST['categoria'],$_SESSION['Id']);
	if ($res1) {
		move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
		echo '<script> alert("El producto Fue agregado con exito")</script>';
		echo '<script> window.location="g_prducto.php"</script>';
	}else{
		echo '<script> alert("Error al agregar producto")</script>';
   		echo '<script> window.location="g_prducto.php"</script>';
	}

}
?>