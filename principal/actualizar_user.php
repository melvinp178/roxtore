<?php
session_start();
require_once('../clases/conexion.php'); 
require_once('../clases/usuarioBD.php');

$conexion= new conexion();
$usuarioBD=new usuarioBD($conexion);


$Res = $usuarioBD->guardaruser($_POST['nombre1'],$_POST['nombre2'],$_POST['documento'],$_POST['apellido1'],$_POST['apellido2'],$_POST['correo'],
                             $_POST['clave'],$_POST['telefono'],$_SESSION['Id']);

if ($Res) {
	echo '<script> alert("El usuario se modifico con exito")</script>';
}else{
	echo '<script> alert("Error al modificar")</script>';
}
echo '<script> window.location="usuario.php"</script>';
?>