
<?php
?>
<!DOCTYPE html>
<html>
<title>Usuario</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<script src="../js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

    
    
    
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Cerrar Menu</a>
  <div class="w3-container">
   <center> <h3 class="w3-padding-64"><b>Roxtore</h3></center>
  </div>
  <div class="w3-bar-block">
   <center> <a href="../principal/home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Inicio </center></a> 
    <a href="dama.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Damas</a> 
    <a href="caballero.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"> Caballeros</a> 
    <a href="nino.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"> Niños</a> 
      
      
    <a href="productos.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Productos</a>

      
      <a href"#" onClick="menu('factura/factura.php');" class="w3-bar-item w3-button w3-hover-white"> Factura</a> 
      
      <center>
      <button type="button" class="btn btn-default btn-sm">
          <a href="salir.php"><span class="glyphicon glyphicons-power"></span> Salir</a>
        </button>
          </center>
  </div>
      
  </div>
</nav>
   
  
   <a class="btn" href="salir.php">Salir</a>
</nav>

<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Roxtore</span>
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">


  <form method="post" action="actualizar_user.php">
  <div class="w3-container" id="niños" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Modificar Informacion</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
      
      <?php
      session_start();
      require_once('../clases/conexion.php'); 
      require_once('../clases/usuarioBD.php');
      
      $conexion= new conexion();
      $usuarioBD=new usuarioBD($conexion);

      $res=$usuarioBD->seleccionar($_SESSION['Id']); 

      ?>
   
       

	<div class="col-xs-5">
		<label class="control-label" for="nombres">Primer Nombre</label>
		<div class="controls">
		<input type="text" name="nombre1" id="nombre1" value="<?php echo $res[1];?>"  placeholder="Primer Nombre" class="form-control span8 tip" required disabled>
	    </div>
        
	</div>
     
      
 <div class="col-xs-5">
		<label class="control-label" for="nombres">Segundo Nombre</label>
		<div class="controls">
		<input type="text" name="nombre2" id="nombre2" value="<?php echo $res[2];?>" placeholder="Segundo Nombre" class="form-control span8 tip" required disabled>
	    </div>
	</div>
      
 <div class="col-xs-5">
		<label class="control-label" for="nombres">Primer Apellido</label>
		<div class="controls">
		<input type="text" name="apellido1" id="apellido1" value="<?php echo $res[4];?>" placeholder="Primer Apellido" class="form-control span8 tip" required disabled>
	    </div>
     
	</div>
      
 <div class="col-xs-5">
		<label class="control-label" for="nombres">Segundo Apellido</label>
		<div class="controls">
		<input type="text" name="apellido2" id="apellido2" value="<?php echo $res[5];?>" placeholder="Segundo Apellido" class="form-control span8 tip" required disabled>
	    </div>
	</div>
    <div class="col-xs-5">
    <label class="control-label" for="nombres">Documento</label>
    <div class="controls">
    <input type="text" name="documento" id="nombre2" value="<?php echo $res[3];?>" placeholder="Segundo Nombre" class="form-control span8 tip" required disabled>
      </div>
  </div>
 <div class="col-xs-5">
		<label class="control-label" for="nombres">Correo</label>
		<div class="controls">
		<input type="email" name="correo" id="correo" value="<?php echo $res[6];?>" placeholder="Correo" class="form-control span8 tip" required disabled>
	    </div>
	</div>
       <br>
      
 <div class="col-xs-5">
		<label class="control-label" for="nombres">Contraseña</label>
		<div class="controls">
		<input type="text" name="clave" id="clave" value="<?php echo $res[7];?>" placeholder="Constraseña" class="form-control span8 tip" required disabled>
	    </div>
	</div>
      <div class="col-xs-5">
		<label class="control-label" for="nombres">Telefono</label>
		<div class="controls">
		<input type="text" name="telefono" id="telefono"  value="<?php echo $res[8];?>" placeholder="Telefono" class="form-control span8 tip" required disabled>
	    </div>
	</div>
  <div class="control-group col-xs-10">
    <br>
  <div class="controls">
    <a id="Btn0" class="btn btn-primary">Actualizar</a>
    <button id="Btn1" class="btn btn-success" type="submit" style="display: none;">Confirmar</button>
    <a href="usuario.php" id="Btn2" class="btn btn-danger" style="display: none;">Cancelar</a>
  </div>
</div>
    </div>
</form>		
    
    
    
    <script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
     
    
function menu(pagina)
{
$.post(pagina,{opcion:'AGREGAR'},function(respuesta)
{
  $('#contenido').html(respuesta);
});
}
    
}

$('#Btn0').click(function(e) {
    document.getElementById("Btn0").style.display = "none";
    document.getElementById("Btn1").style.display = "inline";
    document.getElementById("Btn2").style.display = "inline";
    $(".form-control").removeAttr("disabled");
    e.preventDefault();
  });    
        

</script>

</body>
</html>

