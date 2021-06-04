
<?php
?>
<!DOCTYPE html>
<html>
<title>Pricipal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script>
    
    
    
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
    <a href="dama.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"> Damas</a> 
    <a href="caballero.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Caballeros</a> 
    <a href="nino.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"> Niños</a> 
      
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

<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Roxtore</span>
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:340px;margin-right:40px">

 
    
    <center><h1 class="w3-jumbo"><b>Roxtore</b></h1></center>
    <br>
     <center> <img src="../imagenes/shop.jpg" style="width:90%"></center>
     
    
    
     <p>ROXTOREes un sistema de ventas dedicado a los colombianos empredendedores para que tengan un espacio dentro de un sitio web, en el cual pueden ofrecer sus productos a la venta. </p>
    
         <p> en pocas palabras una tienda virtual se puede describir como  una plataforma de comercio convencional que depende de un sitio web para hacer  sus ventas y transacciones. </p>
   <br>
    <br>
    
 
 
  

  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>


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

