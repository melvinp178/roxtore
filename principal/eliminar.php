<?php 
	require_once('../clases/conexion.php'); 
    require_once('../clases/productoBD.php');

	$id= $_GET['var'];

	$conexion= new conexion();
    $productoBD=new productoBD($conexion);
    $productoBD->eliminar($id);

    echo '<script> alert("Producto Eliminado")</script>';
    echo '<script> window.location="ver_productos.php"</script>';

 ?>