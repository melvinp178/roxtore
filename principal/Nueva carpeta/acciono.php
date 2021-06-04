<?php
session_start();
session_name('universidad');
if($_SESSION['autenticado']){
ini_set('display_errors',1);
error_reporting(E_ALL);

	switch($_POST['opcion']){
	 	case 'agregar':
			require_once("../clases/conexion.php");
			require_once("../clases/tipo_usuarioDAO.php");
			require_once("../clases/carreraDAO.php");
			$conexion = new Conexion();
			$tipo_usuarioDAO=new tipo_usuarioDAO($conexion);
			$carreraDAO=new carreraDAO($conexion);
			
			$resTipoUsuario=$tipo_usuarioDAO->listarTipoUsuario();
			$resCarrera=$carreraDAO->listarCarrera();
		  ?>
		  <form id="fAgregar" name="fAgregar">
		  
		  <div class="panel panel-default">
  <div class="panel-heading">Registrar Uusuario</div>

  <table class="table">
    
  
		  	
<tr><td>Nombre</td><td><input  type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"  required /></td>
<td>Precio</td><td><input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio"  required  /></td></tr>
<tr><td>Stock</td><td><input type="text" class="form-control" id="stock" name="stock" placeholder="Ingrese el stock"  required  /></td>
<td>Descripcion</td><td><input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion"  required  /></td></tr>
<td>Talla</td><td><input type="text" class="form-control" id="talla" name="talla" placeholder="Ingrese la talla"  required  /></td></tr>
<tr><td>Cantidad</td><td><input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad"  required  /></td>
<td>Descuento</td><td><input type="text" class="form-control" id="descuento" name="descuento" placeholder="Ingrese el descuento"  required  /></td></tr>
<tr><td>Tipo Usuario</td><td>

<select id="tipo_usuario" name="tipo_usuario" class="form-control" required>
<option value="">Seleccione...</option>
<?php
for($i=0;$i<count($resTipoUsuario);$i++){
	$tipo_usuarioVO=$resTipoUsuario[$i];
echo "<option value='".$tipo_usuarioVO->gettius_id()."'>";
echo $tipo_usuarioVO->gettius_nombre()."</option>";
}

?>
</select>
</td>
<td>Ciudad</td><td>
<select id="carrera" name="carrera" class="form-control" required>
<option value="">Seleccione...</option>
<?php
for($i=0;$i<count($resCarrera);$i++){
	$carreraVO=$resCarrera[$i];
echo "<option value='".$carreraVO->getcarr_id()."'>";
echo $carreraVO->getcarr_nombre()."</option>";
}

?>
</select>


</td></tr>
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
		$.post("acciono.php",datos,function(respuesta) {
			$("#proceso").html(respuesta).fadeIn().fadeOut(5000);
		});	
	}
</script>

		  <?php
		break;
		case 'modificar':
			require_once("../clases/conexion.php");
			require_once("../clases/tipo_usuarioDAO.php");
			require_once("../clases/carreraDAO.php");
			require_once("../clases/producto.DAO.php");
			$conexion = new Conexion();
			$tipo_usuarioDAO=new tipo_usuarioDAO($conexion);
			$carreraDAO=new carreraDAO($conexion);
			$productoDAO=new productoDAO($conexion);
			$productoVO=new productoVO();
			
			$productoVO->setprod_id($_POST['id_persona']);
			
			$resProducto=$productoDAO->seleccionarProducto($productoVO);
			$ProductoVO=$resProducto[0];
			
			$resTipoUsuario=$tipo_usuarioDAO->listarTipoUsuario();
			$resCarrera=$carreraDAO->listarCarrera();
		  ?>
		  <form id="fModificar" name="fModificar">
		  
		  
		  <div class="panel panel-default">
  <div class="panel-heading">Registrar Uusuario</div>

  <table class="table">
 
  
		  
		  
		  
		  	
<tr><td>Nombre</td><td>
<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $productoVO->getprod_nombre();?>"  placeholder="Ingrese el nombre"  required /></td>
<td>Precio</td><td>
<input type="text" class="form-control" id="precio" name="precio" value="<?php echo $productoVO->getprod_precio();?>"  placeholder="Ingrese el correo"  required  /></td></tr>
<tr><td>Stock</td><td>
<input type="text" class="form-control"  id="stock" name="clave"  value="<?php echo $productoVO->getprod_stock();?>"  placeholder="Ingrese la clave"  required /></td></tr>
<td>Descripcion</td><td>
<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $productoVO->getprod_descripcion();?>"  placeholder="Ingrese el telefono"  required /></td></tr>
<td>Talla</td><td>
<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $productoVO->getprod_talla();?>"  placeholder="Ingrese el telefono"  required /></td></tr>
<td>Cantidad</td><td>
<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $productoVO->getprod_cantidad();?>"  placeholder="Ingrese el telefono"  required /></td></tr>
<td>Descuento</td><td>
<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $productoVO->getprod_descuento();?>"  placeholder="Ingrese el telefono"  required /></td></tr>
<tr><td>Tipo Usuario</td><td>
<select id="tipo_usuario" name="tipo_usuario" class="form-control" required>
<option value="">Seleccione...</option>
<?php
$selecto='';
for($i=0;$i<count($resTipoUsuario);$i++){
	$tipo_usuarioVO=$resTipoUsuario[$i];
	if( $productoVO->gettius_id()==$tipo_usuarioVO->gettius_id()){
	$selecto='selected';
	}else{
	$selecto='';
	}
echo "<option value='".$tipo_usuarioVO->gettius_id()."' $selecto>";
echo $tipo_usuarioVO->gettius_nombre()."</option>";
}

?>
</select>
</td>
<td>Ciudad</td><td>
<select id="carrera" name="carrera" class="form-control" required>
<option value="">Seleccione... </option>
<?php
$selecto='';
for($i=0;$i<count($resCarrera);$i++){
	$carreraVO=$resCarrera[$i];
	if( $productoVO->getcarr_id()==$carreraVO->getcarr_id()){
	$selecto='selected';
	}else{
	$selecto='';
	}
echo "<option value='".$carreraVO->getcarr_id()."' $selecto>";
echo $carreraVO->getcarr_nombre()."</option>";
}

?>
</select>
</td></tr>
<tr><td colspan="4">
<input type="hidden" name="opcion" id="opcion" value="modificarGuardar" />
<input type="hidden" name="id" id="id" value="<?php echo $productoVO->getprod_id();?>" />
<input type="button"  value="Modificar"  onclick="modificarGuardar()" class="btn btn-primary"/></td></tr>

</table>
</div>

</form>
<hr />
<script>
	function modificarGuardar(){
		var datos=$('#fModificar').serialize();
		$.post("acciono.php",datos,function(respuesta) {
			$("#proceso").html(respuesta).fadeIn().fadeOut(5000);
		});	
	}
</script>

		  <?php
		break;
		case 'listar':
			require_once("../clases/conexion.php");
require_once("../clases/productoDAO.php");
$conexion = new Conexion();
$productoDAO=new productoDAO($conexion);

$res=$productoDAO->listarUsuarios();

?>

<div class="panel panel-default">
  <div class="panel-heading">Usuarios Registrdos</div>

  <table class="table">
  

<tr><th>Nombre</th><th>Correo</th><th>Telefono</th><th>Tipo Usuario</th><th>Accion</th></tr>

<?php
for($i=0;$i<count($res);$i++){
$productoVO=$res[$i];
echo "<tr><td>".$productoVO->getprod_nombre()."</td><td>".$productoVO->getprod_precio();
echo "</td><td>".$productoVO->getprod_stock()."</td><td>".$productoVO->gettius_nombre();
echo "</td><td><a href='javascript:void(0)' 
onclick='eliminar(".$productoVO->getprod_id().")'>  Eliminar</a>

 <a href='javascript:void(0)' 
onclick='modificar(".$productoVO->getprod_id().")'> Modificar</a>
</td></tr>";
}

?>
  
  </table>
</div>
<?php
		break;  
	case 'eliminar':
	require_once("../clases/conexion.php");
	require_once("../clases/productoDAO.php");
	$conexion = new Conexion();
	$productoDAO=new productoDAO($conexion);
	$productoVO=new productoVO();
	
	
	$productoVO->setprod_id($_POST['id_persona']);
	
	$rs=$productoDAO->eliminar($productoVO);
	if($rs){
	echo "<h2>Elimino al usuario con id ".$_POST['id_persona']."</h2>";
	?>
	<script>
	$.post( "acciono.php",{opcion:"listar"}, function( data ) {
  $( "#contenedor2" ).html( data ).fadeOut().fadeIn(3000);
});
	
	</script>
	<?php
	$conexion->confirmar();
	}else{
	echo "<h2>No se pudo eliminar al usuario con id ".$_POST['id_persona']."</h2>";
	$conexion->revertir();
	}
	break;
	case 'guardar':
	require_once("../clases/conexion.php");
	require_once("../clases/productoDAO.php");
	$conexion = new Conexion();
	$productoDAO=new productoVODAO($conexion);
	$productoVO=new $productoVO();
	
	$productoVO->setprod_nombre($_POST['nombre']);
	$productoVO->setprod_precio($_POST['precio']);
	$productoVO->setprod_stock($_POST['stock']);
	$productoVO->setprod_descripcion($_POST['descripcion']);
	$productoVO->setprod_talla($_POST['talla']);
	$productoVO->setprod_cantidad($_POST['cantidad']);
	$productoVO->setprod_descuento($_POST['descuento']);

	$productoVO->setp_id($_POST['tipo_usuario']);
	$productoVO->setcarr_id($_POST['carrera']);
	
	$res=$productoDAO->insertar($productoVO);
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
	require_once("../clases/productoDAO.php");
	$conexion = new Conexion();
	$productoDAO=new productoDAO($conexion);
	$productoVO=new productoVO();
	
$productoVO->setprod_nombre($_POST['nombre']);
	$productoVO->setprod_precio($_POST['precio']);
	$productoVO->setprod_stock($_POST['stock']);
	$productoVO->setprod_descripcion($_POST['descripcion']);
	$productoVO->setprod_talla($_POST['talla']);
	$productoVO->setprod_cantidad($_POST['cantidad']);
	$productoVO->setprod_descuento($_POST['descuento']);

	$productoVO->setp_id($_POST['tipo_usuario']);
	$productoVO->setcarr_id($_POST['carrera']);
	
	$res=$productoDAO->modificar($productoVO);
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
