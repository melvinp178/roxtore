<script>
$("#imprimir").click(function(){
$(".listar").printArea();
});
</script>
	
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

  <!-- Table -->
  <table class="table">
    
  
		  	
<tr><td>Nombre</td><td><input  type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"  required /></td>
<td>Correo</td><td><input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo"  required  /></td></tr>
<tr><td>Clave</td><td><input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese la clave"  required  /></td>
<td>Telefono</td><td><input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono"  required  /></td></tr>
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
		$.post("accion.php",datos,function(respuesta) {
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
			require_once("../clases/usuarioDAO.php");
			$conexion = new Conexion();
			$tipo_usuarioDAO=new tipo_usuarioDAO($conexion);
			$carreraDAO=new carreraDAO($conexion);
			$usuarioDAO=new usuarioDAO($conexion);
			$usuarioVO=new usuarioVO();
			
			$usuarioVO->setusua_id($_POST['id_persona']);
			
			$resUsuario=$usuarioDAO->seleccionarUsuario($usuarioVO);
			$usuarioVO=$resUsuario[0];
			
			$resTipoUsuario=$tipo_usuarioDAO->listarTipoUsuario();
			$resCarrera=$carreraDAO->listarCarrera();
		  ?>
		  <form id="fModificar" name="fModificar">
		  
		  
		  <div class="panel panel-default">
  <div class="panel-heading">Registrar Uusuario</div>

  <table class="table">
 
  
		  
		  
		  
		  	
<tr><td>Nombre</td><td>
<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuarioVO->getusua_nombre();?>"  placeholder="Ingrese el nombre"  required /></td>
<td>Correo</td><td>
<input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuarioVO->getusua_correo();?>"  placeholder="Ingrese el correo"  required  /></td></tr>
<tr><td>Clave</td><td>
<input type="password" class="form-control" type="password" id="clave" name="clave"  value="<?php echo $usuarioVO->getusua_clave();?>"  placeholder="Ingrese la clave"  required /></td>
<td>Telefono</td><td>
<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuarioVO->getusua_tel();?>"  placeholder="Ingrese el telefono"  required /></td></tr>
<tr><td>Tipo Usuario</td><td>
<select id="tipo_usuario" name="tipo_usuario" class="form-control" required>
<option value="">Seleccione...</option>
<?php
$selecto='';
for($i=0;$i<count($resTipoUsuario);$i++){
	$tipo_usuarioVO=$resTipoUsuario[$i];
	if( $usuarioVO->gettius_id()==$tipo_usuarioVO->gettius_id()){
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
	if( $usuarioVO->getcarr_id()==$carreraVO->getcarr_id()){
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
<input type="hidden" name="id" id="id" value="<?php echo $usuarioVO->getusua_id();?>" />
<input type="button"  value="Modificar"  onclick="modificarGuardar()" class="btn btn-primary"/></td></tr>

</table>
</div>

</form>
<hr />
<script>
	function modificarGuardar(){
		var datos=$('#fModificar').serialize();
		$.post("accion.php",datos,function(respuesta) {
			$("#proceso").html(respuesta).fadeIn().fadeOut(5000);
		});	
	}
</script>

		  <?php
		break;
		case 'listar':
			require_once("../clases/conexion.php");
require_once("../clases/usuarioDAO.php");
$conexion = new Conexion();
$usuarioDAO=new usuarioDAO($conexion);

$res=$usuarioDAO->listarUsuarios();

?>
<a href="javascrip:void(0)" id="imprimir" class="glyphicon glyphicon-list-alt"> IMPRIMIR </a>
<br /><br /><br />
<div class="panel panel-default listar">
  <div class="panel-heading">Usuarios Registrdos</div>

  <table class="table">
  

<tr><th>Nombre</th><th>Correo</th><th>Telefono</th><th>Tipo Usuario</th><th>Accion</th></tr>

<?php
for($i=0;$i<count($res);$i++){
$usuarioVO=$res[$i];
echo "<tr><td>".$usuarioVO->getusua_nombre()."</td><td>".$usuarioVO->getusua_correo();
echo "</td><td>".$usuarioVO->getusua_tel()."</td><td>".$usuarioVO->gettius_nombre();
echo "</td><td><a href='javascript:void(0)' 
onclick='eliminar(".$usuarioVO->getusua_id().")'>  Eliminar</a>

 <a href='javascript:void(0)' 
onclick='modificar(".$usuarioVO->getusua_id().")'> Modificar</a>
</td></tr>";
}

?>
  
  </table>
</div>
<?php
		break;  
	case 'eliminar':
	require_once("../clases/conexion.php");
	require_once("../clases/usuarioDAO.php");
	$conexion = new Conexion();
	$usuarioDAO=new usuarioDAO($conexion);
	$usuarioVO=new usuarioVO();
	
	
	$usuarioVO->setusua_id($_POST['id_persona']);
	
	$rs=$usuarioDAO->eliminar($usuarioVO);
	if($rs){
	echo "<h2>Elimino al usuario con id ".$_POST['id_persona']."</h2>";
	?>
	<script>
	$.post( "accion.php",{opcion:"listar"}, function( data ) {
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
	require_once("../clases/usuarioDAO.php");
	$conexion = new Conexion();
	$usuarioDAO=new usuarioDAO($conexion);
	$usuarioVO=new usuarioVO();
	
	$usuarioVO->setusua_nombre($_POST['nombre']);
	$usuarioVO->setusua_correo($_POST['correo']);
	$usuarioVO->setusua_clave($_POST['clave']);
	$usuarioVO->setusua_tel($_POST['telefono']);
	$usuarioVO->settius_id($_POST['tipo_usuario']);
	$usuarioVO->setcarr_id($_POST['carrera']);
	
	$res=$usuarioDAO->insertar($usuarioVO);
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
	require_once("../clases/usuarioDAO.php");
	$conexion = new Conexion();
	$usuarioDAO=new usuarioDAO($conexion);
	$usuarioVO=new usuarioVO();
	
	$usuarioVO->setusua_nombre($_POST['nombre']);
	$usuarioVO->setusua_correo($_POST['correo']);
	$usuarioVO->setusua_clave($_POST['clave']);
	$usuarioVO->setusua_tel($_POST['telefono']);
	$usuarioVO->settius_id($_POST['tipo_usuario']);
	$usuarioVO->setcarr_id($_POST['carrera']);
	$usuarioVO->setusua_id($_POST['id']);
	
	$res=$usuarioDAO->modificar($usuarioVO);
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