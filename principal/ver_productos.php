<?php
?>
<!DOCTYPE html>
<html>
<title>Productos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
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
   <center> <h3 class="w3-padding-64"><b>ROXtore</h3></center>
  </div>
  <div class="w3-bar-block">
   <center> <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Inicio </center></a> 
  <a href="dama.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galeria Damas</a>
   <a href="caballero.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galeria Caballeros</a>
    <a href="nino.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galeria Niños</a>
      
      <a href="usuario.php" onClick="w3_close()" class="w3-bar-item w3-button w3-hover-white"> Usuarios</a>
        <a href="productos.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Productos</a>
      
      <a href"#" onClick="menu('factura/factura.php');" class="w3-bar-item w3-button w3-hover-white"> Factura</a> 
      <center>
      <button type="button" class="btn btn-default btn-sm">
          <a href="salir.php"><span class="glyphicon glyphicons-power"></span> Salir</a>
        </button>
          </center>
      
      
  </div>
</nav>
   
  
   <a class="btn" href="salir.php">Salir</a>
</nav>
   
  
   <a class="btn" href="salir.php">Salir</a>
</nav>

<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>ROXtore</span>
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:340px;margin-right:40px">
    
    
    <div class="w3-container" id="niños" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Listado de productos</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Categoria</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
            session_start();

            require_once('../clases/conexion.php'); 
            require_once('../clases/productoBD.php');
            $conexion= new conexion();
            $productoBD=new productoBD($conexion);
            $lista=$productoBD->seleccionarproduser($_SESSION['Id']);
            $n=0;
            while ($n < $num=$productoBD->contarproduser($_SESSION['Id'])) {

              echo 
              '<tr>
              <td style="width:140px"><img src="../images/'.$lista[$n]["prod_imagen"].'" style="width:80px"></td>
              <td>'.$lista[$n]["prod_nombre"].'</td>
              <td>$ '.$lista[$n]["prod_precio"].'</td>
              <td>'.$lista[$n]["categoria"].'</td>
              <td><a href="modificar_productos.php?varid='.$lista[$n]["prod_id"].'">Modificar</a></td>
              <td><a href="eliminar.php?var='.$lista[$n]["prod_id"].'">Eliminar</a></td>
              </tr>';
              $n++;
            }

            ?>
    </tbody>
  </table>
    
        </div>
    
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

</script>
      
      
      


</body>
</html>