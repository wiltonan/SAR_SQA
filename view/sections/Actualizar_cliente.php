
<?php
	require_once '../../model/connection.php';
	require_once '../../model/horas_extras.php';

	$actualizar=Horas_Extras::Modificar_cliente($_GET["actualizar"]);
?>

<div class="actcliente01">
	<form method="post"  action="../../controller/Horas_extras.php">
		<br><br><br>
				<h1>Actualizar cliente</h1>
				<label>Gerente Proyectos:</label><br>
				<input name="Gerente_Proyectos" class="form-control" rows="10"  /><br>
				<label>Nombre Cliente:</label><br>
				<input type="text" class="form-control"  name="Nombre_Cliente" /><br>
				<label>Hora inicio:</label><br>
				<input name="Hora_Inicio" class="form-control"  rows="10"  /><br>
				<label>Horas fin:</label><br>
				<input name="Hora_Fin" class="form-control"  rows="10"  /><br>
				<label>Horas laboradas:</label><br>
				<input name="Horas_Laboradas" class="form-control"  rows="10"  /><br>

				<button type="submit" class="btn btn-success active"  id="btn-guardar" name="actual" value="Modificar_cliente">Guardar</button>

	</form>
</div>
