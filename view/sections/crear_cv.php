<?php
	require_once '../../model/connection.php';
	require_once '../../model/hoja_vida.php';

	$sr = hoja_vida::mstrr_sr_sn_cv();
	$crg= hoja_vida::mstrr_crg();
	$rl= hoja_vida::mstrr_rl();
?>

<div class="crr_cv">
	<form class="form-horizontal" action="../../controller/hoja_vida.php" method="POST">
	 	<center><h2>Información personal.</h2></center>

 		<div class="form-group">
 			<div class="col-xs-12 col-sm-6">
 				<label for="usr">Usuario (*)</label>
				<select class="form-control select" name="sr_cv">
					<option value="crear" >Usuario</option>
					<?php foreach ($sr as $usuario_cv) {
						echo "<option value=".$usuario_cv[0].">".$usuario_cv[1]."</option>";
					} ?>
				</select>
			</div>

			<div class="col-xs-12 col-sm-6">
				<label for="usr">Cargo (*)</label>
				<select class="form-control select" name="crg">
					<option value="crear">Cargo</option>
					<?php foreach ($crg as $cargo) {
						echo "<option value=".$cargo[0].">".$cargo[1]."</option>";
					} ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-6">
				<label for="usr">Rol (*)</label>
				<select class="form-control select" name="rl">
					<option value="crear">Rol</option>
					<?php foreach ($rl as $rol) {
						echo "<option value=".$rol[0].">".$rol[1]."</option>";
					} ?>
				</select>
			</div>
		</div>
	 		

		<div class="form-group">
 			<center><h2>Dirección donde el usuario va ha colocar los archivos de evidencia.</h3></center>
			<div class="col-xs-12 col-sm-12">
				<input class="form-control inputs" type="url" name="drccn_dcmnts" >
			</div>
		</div>

	 	<center><button type="button" id="BtnRegistrar" class="btn" name="ctn" value="rgstrr_crr_cv">Registrar</button></center>
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
        if (validar==true) {
          document.getElementById('BtnRegistrar').type="submit";
        }
    });
});
</script>

