<?php 
	require_once('../clases/conexion.php'); 
    require_once('../clases/productoBD.php');

	$id= $_GET['var1'];

	$conexion= new conexion();
    $productoBD=new productoBD($conexion);

    $Res = $productoBD->guardarproducto($id,$_POST['prod_nombre'],$_POST['prod_precio'],$_POST['categoria']);

if ($Res) {
	 echo '<script> alert("Producto Actualizado")</script>';
}else{
	echo '<script> alert("Error al Actualizar")</script>';
}
echo '<script> window.location="ver_productos.php"</script>';
    

 ?>