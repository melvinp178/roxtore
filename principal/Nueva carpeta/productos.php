<?php
session_start();
session_name('universidad');
if(@$_SESSION['autenticado']){
echo "Bienvenido: ". $_SESSION['usua_nombre']. ' ';

ini_set('display_errors',1);
error_reporting(E_ALL);

?>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
$( document ).ready(function() {
    $.post( "acciono.php",{opcion:"agregar"}, function( data ) {
  $( "#contenedor1" ).html( data );
});

  $.post( "acciono.php",{opcion:"listar"}, function( data ) {
  $( "#contenedor2" ).html( data );
});
});
function eliminar(id){
	  $.post( "acciono.php",{opcion:"eliminar",id_persona:id}, function( data ) {
   $( "#proceso" ).html( data ).fadeIn().fadeOut(3000);
});
}
function modificar(id){
	  $.post( "acciono.php",{opcion:"modificar",id_persona:id}, function( data ) {
   $( "#contenedor1" ).html( data );
});
}
</script>
<div id="proceso"></div>
<div id="contenedor1">contenedor1</div>
<div id="contenedor2">contenedor2</div>

<?php

}else{

header('location:../index.php');
}
?>

