
<?php

require_once('../clases/conexion.php'); 
require_once('../clases/usuarioBD.php');

$conexion= new conexion();
$usuarioBD=new usuarioBD($conexion);


$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$documento= $_POST['documento'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$fnacimiento = $_POST['fnacimiento'];

$res=$usuarioBD->seleccionar($_POST['documento']);

if($res)
{
     echo '<script> alert("El usuario ya existe")</script>';
     echo '<script> window.location="guardar_formulario.php"</script>';
    
}
else
{
    $res=$usuarioBD->guardar($_POST['nombre1'],$_POST['nombre2'],$_POST['documento'],$_POST['apellido1'],$_POST['apellido2'],$_POST['correo'],
                             $_POST['clave'],$_POST['telefono'],$_POST['ciudad'],$_POST['fnacimiento']);
    
    
    echo '<script> alert("El usuario fue agregado con exito")</script>';
    echo '<script> window.location="index.php"</script>';

}




?>