<h1>FACTURA</h1>


<?php
$opcion=$_POST["opcion"];

if($opcion=="AGREGAR")
{

  ?>
  
  <div class="well "><h3>Buscar factura </h3></div>
  <form class="form-horizontal" rol="form" id="form1">
      <div class="form-group">
	      <label for="usua_nombre" class="col-md-3 control-label">Codigo del cliente:</label>
		  <div class="col-md-9">
		      <input type="text" class="form-control" id="usua_proveedor" name="usua_proveedor" placeholder="Ingrese el codigo del proveedor"  required />
		  </div>
	  </div>
	  
	  <div class="form-group">
	      <label for="usua_correo" class="col-md-3 control-label">Nombre:</label>
		  <div class="col-md-9">
		      <input type="email" class="form-control" id="prove_nombre" name="prove_nombre" placeholder="Ingrese el nombre" required/>
		  </div>
	  </div>
	  
	  <div class="form-group">
	      <label for="usua_clave" class="col-md-3 control-label">Numero de factura:</label>
		  <div class="col-md-9">
		      <input type="text" class="form-control" id="prove_clave" name="prove_localidad" placeholder="Ingrese la localidad" required/>
		  </div>
	  </div>
	  
	  
	  <div class="form-group">
	      <label for="tius_id" class="col-md-3 control-label">Ciudad:</label>
		  <div class="col-md-9">
		      <select name="tius-id" id="tius_id" class="form-control" required>
			      <option value="">Seleccione...</option>
				  <option value="1">Medellin</option>
				  <option value="2">Bogota</option> 
				  <option value="2">Cali</option> 
				  <option value="2">Barranquilla</option> 
				  <option value="2">Bucaramanga</option> 
			  </select>
		  </div>
	  </div>
	  
	    <div class="form-group">
	      <label for="usua_telefono" class="col-md-3 control-label">Fecha inicio:</label>
		  <div class="col-md-9">
		      <input type="text" class="form-control" id="usua_telefono" name="usua_telefono" placeholder="Ingrese el telefono" />
		  </div>
	  </div>
	  
	    <div class="form-group">
	      <label for="usua_telefono" class="col-md-3 control-label">Fecha fin:</label>
		  <div class="col-md-9">
		      <input type="text" class="form-control" id="usua_telefono" name="usua_telefono" placeholder="Ingrese el telefono" />
		  </div>
	  </div>
	  
	  <div class="form-group"> 
	      <div class="col-md-offset-3 col-md-6">
		     <input type="submit" value="Buscar" class="btn btn-primary"/>  
			   <input type="submit" value="Limpiar" class="btn btn-primary"/>  
			      <input type="submit" value="Nueva factura" class="btn btn-primary"/>
		
				 
	 
	 
		</div>
	  </div>
  </form>
  <?php
}
else if ($opcion=="MODIFICAR")
{
  ?>
  <img src="../img/fam.jpg" width="100%";>
  <?php
}

else if ($opcion=="LISTAR")
{
  ?>
  <img src="../img/fam.jpg" width="100%";>
  <?php
}
?> 