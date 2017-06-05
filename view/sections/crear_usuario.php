<?php
	require_once '../../model/connection.php';
	require_once '../../model/hoja_vida.php';

	$tp_documento=hoja_vida::mstrr_tp_dcmnt();
	$prvlgs=hoja_vida::mstrr_prfl();
 ?>

<div class="crr_sr">
	<form class="form-horizontal" action="../../controller/hoja_vida.php" method="POST">
		<center><h1 class="Rdstrr_us">Registrar usuario</h1></center>
			
		<div class="form-group"> 
			<div class="col-xs-12 col-sm-6">
			<label for="usr">Tipo de documento (*)</label>
				<select class="form-control select" name="tp_dcmnt">
					<option value="crear">Tipo de documento</option>
					<?php foreach ($tp_documento as $documento) {
						echo"<option value=".$documento[0].">".$documento[1]."</option>";
					} ?>
				</select>
			</div>

			
			<div class="col-xs-12 col-sm-6">
				<label for="usr">Numero de documento (*)</label>
				<input class="form-control inputs" type="number" name="cdl"  placeholder="Numero de documento">
			</div>
		
		</div>

		<div class="form-group"> 
			<div class="col-xs-12 col-sm-6">
				<label for="usr">Lugar de expedición (*)</label>
				<input  class="form-control inputs" type="text" name="Lgr_xpdcn" placeholder="Lugar de expedición">
			</div>

			<div class="col-xs-12 col-sm-6">
				<label for="usr">Nick (*)</label>
				<input  class="form-control inputs" type="text" name="nck" placeholder="Nick">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-6">
				<label for="usr">Contraseña (*)</label>
				<input class="form-control inputs" type="password" id="1" name="cntrsn" placeholder="Contraseña">
			</div>

			<div class="col-xs-12 col-sm-6">
				<label for="usr">Confrimar contraseña (*)</label>
				<input class="form-control inputs" type="password" id="2" name="cntrsn" placeholder="Confrimar contraseña">
			</div>
		</div> 

		<div class="form-group"> 
			<div class="col-xs-12 col-sm-6">
				<label for="usr">Correo (*)</label>
				<input class="form-control inputs" id="Correo" type="email" name="crr" placeholder="Correo">
			</div>

			<div class="col-xs-12 col-sm-6">
				<label for="usr">Privilegios (*)</label>
				<select class="form-control select" name="prvlg">
					<option value="crear">Privilegios</option>
					<?php foreach ($prvlgs as $privile) {
						echo"<option value=".$privile[0].">".$privile[1]."</option>";
					} ?>
				</select>
			</div>
		</div>
				
			
		<center><button type="button" id="BtnRegistrar" class="btn" name="ctn" value="Rdstrr_sr">Registrar</button></center>
	</form>	
</div>

<script type="text/javascript" src="../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
	$(document).on('ready', function () {
    $("#BtnRegistrar").click(function () {
        $(".remove").remove();
        var boo = 0;
        var inputs = $(".inputs");
        var input, selet;
        var validar=true;

        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value == "") {
              boo++
                input = $(inputs[i]);
                input.focus().after("<div  style='font-size:15px;' class='remove'><font color='red'>Este campo es obligatorio</font><div>");  
                validar=false;
            } 
        }

        var selec = $(".select");
        for (var i = 0; i < selec.length; i++) {
            if (selec[i].value == "crear") {
              boo++
                selet = $(selec[i]);
                selet.focus().after("<div style='font-size:15px;' class='remove'><font color='red'>Este campo es obligatorio</font><div>");
                validar=false;
            } 
        }

        var contra = document.getElementById(1).value;
        var contra_va = document.getElementById(2).value;
        if (contra != contra_va) {
        	alert("Las contraseñas no coinciden.");
        	validar=false;
        }

        if (validar==true) {
          document.getElementById('BtnRegistrar').type="submit";
        }
    });
});
</script>

