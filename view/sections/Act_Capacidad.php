<?php
	require_once '../../model/connection.php';
	require_once '../../model/capacidad.php';

	$el_codigo=capacidad::consulta_codigo($_GET["hola"]);

	$s= capacidad::consulta_cargo();
	$r= capacidad::consulta_rol();
	$cl= capacidad::consulta_cliente();
	$nv= capacidad::consulta_novedad();
	$sv= capacidad::consulta_servicio();
	$ci= capacidad::consulta_ciudad();
?>

<div class="cosa">
	<form action="../../controller/capacidad.php" method="POST">
		<fieldset>
			<article class="container">
				<legend align="center">Actualización informe de capacidad</legend>
				<section class="row-6">
					<div class="col-md-6 col-md-4">
					<input type="hidden" value="<?php echo $el_codigo[13]; ?>" name="cod">
						<label>Nombre</label>
						<input class="form-control" type="text" value="<?php echo $el_codigo[0]; ?>" name="nombres">
					</div>

					<div class="col-md-4  col-md-4">
						<label>Apellido</label>
						<input type="text" class="form-control" placeholder="Ej. Martinez Cespedes" value="<?php echo $el_codigo[1];?>" name="apellidos">
					</div>

					<div class="col-md-4  col-md-4">
						<label>Cédula</label>
						<input type="text" class="form-control" value="<?php echo $el_codigo[2]; ?>"placeholder="Ej. 45678936" name="iden">
					</div>
				</section>

				<section class="row-6">
					<div class="col-md-4  col-md-4">
						<label>Ubicación</label>
						<input type="text" class="form-control" placeholder="Ej. SQA" value="<?php echo $el_codigo[3]; ?>" name="ubicacion">
					</div>

					<!-- <div class="col-md-4  col-md-4">
						<label>Factura<br></label>

						<input type="radio" value="<?php echo $el_codigo['5'] ?>" name="factura">

						<input type="radio" value="<?php echo $el_codigo['5'] ?>"  name="factura">

					</div> -->



				<div class="col-md-4  col-md-4">
				<label>Cargo</label>
	              <select class="form-control" name="cargo">
	                <option disabled selected>Cargo</option>
	                <?php foreach ($s as $cargo) {

	                  if($cargo["Id_Cargo"] == $el_codigo["Id_Cargo"]){
	                    $selected = "selected";
	                  }else{
	                    $selected = "";
	                  }
	                  echo "<option value=".$cargo["Id_Cargo"]." $selected>".$cargo["Nombre_Cargo"]."</option>";
	                }?>
	              </select>
	            </div>
</section>
				<section class="row-6">
					<div class="col-md-4  col-md-4">
						<label>Nombre Gerente de proyectos</label>
						<input type="text" class="form-control" value="<?php echo $el_codigo[5];?>" disabled="true">
					</div>

					<div class="col-md-4  col-md-4">
						<label>Facturación</label>
						<input type="number" class="form-control" placeholder="(%) porcentaje" value="<?php echo $el_codigo[6];?>" name="facturacion">
					</div>

					<div class="col-md-4  col-md-4">
						<label>Rol</label>
						   <select class="form-control" name="rol">
								<option disabled selected>Rol</option>
	                				<?php foreach ($r as $rol) {

	                  					if($rol["Id_Rol"] == $el_codigo["Id_Rol"]){
	                    					$selected = "selected";
	                 					 }else{
					                   	 $selected = "";
					                  }
					                  echo "<option value=".$rol["Id_Rol"]." $selected>".$rol["Nombre_Rol"]."</option>";
					                }?>
							</select>
						</div>
				</section>


				<div class="col-md-4  col-md-4">
					<label>Cliente</label>
						<select class="form-control" name="cliente">
								<option disabled selected>Seleccione cliente</option>
	                				<?php foreach ($cl as $cliente) {

	                  					if($cliente["Id_Cliente"] == $el_codigo["Id_Cliente"]){
	                    					$selected = "selected";
						                	}else{
						                    $selected = "";
						                  	}
						                	echo "<option value=".$cliente["Id_Cliente"]." $selected>".$cliente["Nombre_Cliente"]."</option>";
						               }?>
							</select>
				</div>

				<div class="col-md-4  col-md-4">
					<label>Novedad</label>
					<select class="form-control" name="novedad">
								<option disabled selected>Seleccione novedad</option>
	                				<?php foreach ($nv as $novedad) {

	                  					if($novedad["Id_Novedad"] == $el_codigo["Id_Novedad"]){
	                    					$selected = "selected";
	                  					}else{
	                    					$selected = "";
	                  					}
	                 	 echo "<option value=".$novedad["Id_Novedad"]." $selected>".$novedad["Tipo_Novedad"]."</option>";
	                }?>
						</select>
				</div>

				<div class="col-md-4 col-md-4">
					<label>Modelo servicio</label>
					<select class="form-control" name="servicio">
								<option disabled selected>Seleccione servicio</option>
	                				<?php foreach ($sv as $servicio) {

	                  					if($servicio["Id_Servicio"] == $el_codigo["Id_Servicio"]){
	                    					$selected = "selected";
	                  }else{
	                    $selected = "";
	                  }
	                  echo "<option value=".$servicio["Id_Servicio"]." $selected>".$servicio["Nombre_Servicio"]."</option>";
	                }?>
						</select>
				</div>

				<div class="col-md-4  col-md-4">
					<label>Ciudad</label>
					<select class="form-control" name="ciudad">
								<option disabled selected>Seleccione servicio</option>
	                				<?php foreach ($ci as $ciudad) {

	                  					if($ciudad["Id_Ciudad"] == $el_codigo["Id_Ciudad"]){
	                    					$selected = "selected";
	                  }else{
	                    $selected = "";
	                  }
	                  echo "<option value=".$ciudad["Id_Ciudad"]." $selected>".$ciudad["Nombre_Ciudad"]."</option>";
	                }?>
						</select>
				</div>

				<div class="col-md-8 col-md-8">
					<label>Observaciones</label>
					<textarea class="form-control" rows="6" placeholder="Ej. Cambio de cliente desde el 28 de noviembre"  name="observacion"><?php echo $el_codigo[12];?></textarea>
				</div>


				<div class="form-actions col-md-offset-10 col-md-2">
				    <button type="submit" class="btn btn-success active"  id="btn-guardar" name="actualiz" value="Actualizar">Guardar</button>

				 </div>
			</article>
		</fieldset>
	</form>
</div>
