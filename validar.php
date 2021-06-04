<?php
session_start();
$correo= $_POST['correo'];
$pass= $_POST['clave'];
if(!empty($correo) && !empty($pass)){

require_once'clases/conexion.php'; 
require_once'clases/usuarioBD.php';
$conexion=new conexion();
$usuarioBD=new usuarioBD($conexion);
$respuesta=$usuarioBD->login($correo,$pass);
if($respuesta){
$lista=$respuesta;    
$_SESSION['Id']=$lista[0];
header ("Location: principal/home.php");
}
else{
    
    echo '<script> alert("Usuario o contraseña incorrectos")</script>';
    echo '<script> window.location="index.php"</script>';
}
}
?>
