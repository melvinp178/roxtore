
	<?php
session_start();
session_name('universidad');
if($_SESSION['autenticado']){
ini_set('display_errors',1);
error_reporting(E_ALL);

	switch($_POST['opcion']){
	 	case 'agregar':
			require_once("../clases/conexion.php");
			
		
			$conexion = new Conexion();
			
			
		
		  ?>
		  <form id="fAgregar" name="fAgregar">
		  
		  <div class="panel panel-default">
  <div class="panel-heading">Registrar Uproveedor</div>

  <table class="table">
    
  
		  	
<tr><td>Nombre</td><td><input  type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"  required /></td>

<td>Telefono</td><td><input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono"  required  /></td></tr>
<tr><td colspan="4">
<input type="hidden" name="opcion" id="opcion" value="guardar" />
<input type="button"  value="Agregar"  onclick="agregar()" class="btn btn-primary"/></td></tr>
</table>
</div>
</form>
<hr />
<script>
	function agregar(){
		var datos=$('#fAgregar').serialize();
		$.post("accionp.php",datos,function(respuesta) {
			$("#proceso").html(respuesta).fadeIn().fadeOut(15000);
		});	
	}
</script>

		  <?php
		break;
		case 'modificar':
			require_once("../clases/conexion.php");
			require_once("../clases/proveedorDAO.php");
			$conexion = new Conexion();
			$proveedorDAO=new proveedorDAO($conexion);
			$proveedorVO=new proveedorVO();
			
			$proveedorVO->setcodigo_proveedor($_POST['id']);
			
			$resproveedor=$proveedorDAO->seleccionarProveedor($proveedorVO);
			$proveedorVO=$resproveedor[0];
		  ?>
		  <form id="fModificar" name="fModificar">
		  
		  
		  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">modificar Proveedor</div>

  <!-- Table -->
  <table class="table">
 
  
		  
		  
		  
		  	
<tr><td>Nombre</td>
<td><input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $proveedorVO->getnombre();?>"  placeholder="Ingrese el nombre"  required /></td>

<td>Telefono</td><td>
<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $proveedorVO->gettelefono();?>"  placeholder="Ingrese el telefono"  required /></td></tr>



<tr><td colspan="4">
<input type="hidden" name="opcion" id="opcion" value="modificarGuardar" />
<input type="hidden" name="codigo_proveedor" id="codigo_proveedor" value="<?php echo $proveedorVO->getcodigo_proveedor();?>" />
<input type="button"  value="Modificar"  onclick="modificarGuardar()" class="btn btn-primary"/></td></tr>

</table>
</div>

</form>
<hr />
<script>
	function modificarGuardar(){
		var datos=$('#fModificar').serialize();
		$.post("accionp.php",datos,function(respuesta) {
			$("#proceso").html(respuesta).fadeIn().fadeOut(20000);
		});	
	}
</script>

		  <?php
		break;
		case 'listar':
			require_once("../clases/conexion.php");
require_once("../clases/proveedorDAO.php");
require_once("../clases/proveedorVO.php");
$conexion = new Conexion();
$proveedorDAO = new proveedorDAO($conexion);
$proveedorVO = new proveedorVO();
$res=$proveedorDAO->listarProveedores();

?>

<div class="panel panel-default">
  <div class="panel-heading">Proveedor Registrado</div>

  <table class="table">
  

<tr><th>Nombre</th><th>Telefono</th><th>Accion</th></tr>

<?php
for($i=0;$i<count($res);$i++){
$proveedorVO=$res[$i];
echo "<tr><td>".$proveedorVO->getnombre()."</td><td>".$proveedorVO->gettelefono();
echo "</td><td>"."<a href='javascript:void(0)' 
onclick='eliminar(".$proveedorVO->getcodigo_proveedor().")'> Eliminar</a>

 <a href='javascript:void(0)' 
onclick='modificar(".$proveedorVO->getcodigo_proveedor().")'> Modificar</a>
</td></tr>";
}

?>
  
  </table>
</div>
<?php
		break;  
	case 'eliminar':
	require_once("../clases/conexion.php");
	require_once("../clases/proveedorDAO.php");
	$conexion = new Conexion();
	$proveedorDAO=new proveedorDAO($conexion);
	$proveedorVO=new proveedorVO();
	
	
	$proveedorVO->setcodigo_proveedor($_POST['id_persona']);
	
	$rs=$proveedorDAO->eliminar($proveedorVO);
	if($rs){
	echo "<h2>Elimino al proveedor con id ".$_POST['id_persona']."</h2>";
	?>
	<script>
	$.post( "accionp.php",{opcion:"listar"}, function( data ) {
  $( "#contenedor2" ).html( data ).fadeOut().fadeIn(3000);
});
	
	</script>
	<?php
	$conexion->confirmar();
	}else{
	echo "<h2>No se pudo eliminar al proveedor con id ".$_POST['id_persona']."</h2>";
	$conexion->revertir();
	}
	break;
	case 'guardar':
	require_once("../clases/conexion.php");
	require_once("../clases/proveedorDAO.php");
	$conexion = new Conexion();
	$proveedorDAO=new proveedorDAO($conexion);
	$proveedorVO=new proveedorVO();
	
	$proveedorVO->setnombre($_POST['nombre']);
	
	$proveedorVO->settelefono($_POST['telefono']);
	
	
	$res=$proveedorDAO->insertar($proveedorVO);
	if($res){
	$conexion->confirmar();
	echo "<script>location.href='principal.php'</script>";
	}else{
		$conexion->revertir();
		echo "Todo salio mal";
	}
	
	
	break;
	case'modificarGuardar':
	
	require_once("../clases/conexion.php");
	require_once("../clases/proveedorDAO.php");
	$conexion = new Conexion();
	$proveedorDAO=new proveedorDAO($conexion);
	$proveedorVO=new proveedorVO();
	
	$proveedorVO->setnombre($_POST['nombre']);
	$proveedorVO->setcodigo_proveedor($_POST['codigo_proveedor']);
	$proveedorVO->settelefono($_POST['telefono']);
	
	
	$res=$proveedorDAO->modificar($proveedorVO);
	if($res){
	$conexion->confirmar();
	echo "<script>location.href='principal.php'</script>";
	}else{
		$conexion->revertir();
		echo "Todo salio mal";
	}
	
	
	
	break;
	
	
	default:
	echo'Opcion invalida';
	break;		
		
	
	
	}
	
	
	
}	