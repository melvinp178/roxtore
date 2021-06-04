<?php

?>
<html>
		<head>
		    <title>sistema de entrada</title>
            <script src="js/jquery-3.1.1.min.js"></script>
		    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

            <link rel="stylesheet" type="text/css" href="css/estilo.css">
            <br>

            <center>
            
	    <img src="imagenes/logo.png" width="300" height="200" >
	 </center>
		</head>
		<body>
            <link rel="stylesheet" type="text/css" href="css/estilo.css">
		 <div id="Contenedor">
		 <div class="Icon">
                   <span class="glyphicon glyphicon-user"></span>
                 </div>
             
 <div class="panel panel-default" style="margin-top:10px;" >
	 <div class="panel-heading" ><center><h1><b><FONT FACE="arial" SIZE=4>INICIAR SESION</FONT></b></h1></center></div>
	 <div class="panel-body">
	 
	 <form id="f1" role="form" action="validar.php" method="post" autocomplete="off">
	 
	  <div class="form-group">
	   <div class="input-group">
	    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	     <input type="email" class="form-control" placeholder="Escriba su correo" name="correo"  id="correo" maxlength="50" required>
	    </div>
	  </div>
	  
	 <div class="form-group">
	 <div class="input-group">
	 <div class="input-group-addon"><span  class="glyphicon glyphicon-lock" onClick="verClave();"></span></div>
	     <input type="password" id="clave" class="form-control" placeholder="Escriba su clave" name="clave"  maxlength="20" required>
		 
	    </div>
	  </div>
	  
	<input type="submit" value="Entrar" class="btn btn-danger" style="width:100%;" required >
	   </form>
         
      <center>  <a href="principal/guardar_formulario.php" class="btn btn" role="button">Registrarse</a></center>

         
	 
	  </div>
	 
	
	</div>
            
    
    <script>
  var estado=true;
   function verClave()
   {
   
   if(estado)
   {
    $('#icono_cambio').removeClass('glyphicon-eye-open');
    $('#icono_cambio').addClass('glyphicon-eye-close');
    $('#clave').attr('type','text');
   }
   else
   {
    $('#icono_cambio').removeClass('glyphicon-eye-close');
    $('#icono_cambio').addClass('glyphicon-eye-open');
    $('#clave').attr('type','password');
   }

     estado=!estado;
}
</script>
		 </div>	
		 </div>

</body>
    <style>
        body{
             background-image: url(imagenes/fond.jpg);
        background-attachment:local;
    background-size:100% 83%;
           
       
        }
       footer {
    background-color: #ffffff;
      color: #2d2d30
      padding: 32px;
  }
</style>
      <center>
<footer class="text-center">
  <a class="up-arrow" href="#" data-toggle="tooltip" title="Subir">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p> ©Roxtore</p> 
    <p>Colombia </p> 

</footer>
          </center>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>