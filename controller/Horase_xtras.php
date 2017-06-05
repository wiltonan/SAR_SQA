<?php
	require_once '../model/connection.php';
	require_once '../model/ejemplo.php';
	$actual=$_REQUEST['actual'];
	switch ($actual) {
		case 'rgstrr_cliente':
			$Gerente_Proyecto=$_POST['Gerente_Proyecto'];
			$Nombre_Cliente=$_POST['Nombre_Cliente'];
			$Hora_Inicio=$_POST['Hora_Inicio'];
			$Hora_Fin=$_POST['Hora_Fin'];
			$Horas_Laboradas=$_POST['Horas_Laboradas'];
			try {
				ejemplo::registrarcliente($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas);
				echo "<script>alert('el registro de ".$Gerente_Proyecto."con exito');
						 self.location.href='../view/menu/Consultar_Cliente.php';
					</script>";
			} catch (Exception $e) {

				echo "Se ha producido un error" .$e;
			}
		break;
		case 'Modificar_cliente':
			$Gerente_Proyecto=$_POST['Gerente_Proyecto'];
			$Nombre_Cliente=$_POST['Nombre_Cliente'];
			$Hora_Inicio=$_POST['Hora_Inicio'];
			$Hora_Fin=$_POST['Hora_Fin'];
			$Horas_Laboradas=$_POST['Horas_Laboradas'];
			$actualizar=$_POST['Id_Cliente'];

			try {
				ejemplo::Modificar_cliente($Gerente_Proyecto, $Nombre_Cliente, $Hora_Inicio, $Hora_Fin, $Horas_Laboradas, $actualizar);
				echo "<script>alert('esta actualizado  ".$Gerente_Proyecto." con exito');
						 self.location.href='../sections/Consultar_Cliente.php';
					</script>";
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;

		case 'RegistrarRecargo':
			$Fecha=$_POST['Fecha'];
			$Cantidad_Horas=$_POST['Cantidad_Horas'];
			$Comentario=$_POST['Comentario'];
			$Empresa_Contratante=$_POST['Empresa_Contratante'];

			try {
				ejemplo::RegistrarRecargo($Fecha,$Cantidad_Horas,$Comentario,$Empresa_Contratante,$Descripcion,$Descripcion1);
				echo "<script>alert('el registro de ".$Fecha." con exito');
						 self.location.href='../sections/Consulta_Analista.php';
					</script>";
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;

		case 'Extras':
			try {
				ejemplo::Extras($Fecha, $Cantidad_Horas);
				echo "<script>alert('el registro de ".$Cantidad_Horas." con exito');
						 self.location.href='../sections/Consulta_Analista.php';
					</script>";
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;

		case 'temporal':

		$Proyecto=$_POST['Proyecto'];
		$Fecha=$_POST['Fecha'];
		$Analista= $_POST['Analista'];
		$Actividad_Rh = $_POST['Actividad_Rh'];
		$Actividad=$_POST['Actividad'];
		$Comentario=$_POST['Comentario'];
		$Horas= $_POST['Horas'];
		$Empresa_Contrata = $_POST['Empresa_Contrata'];
		$ciudad=$_POST['ciudad'];
		$Extras=$_POST['Extras'];

		try {
			ejemplo::temporal($Proyecto,$Fecha,$Analista,$Actividad_Rh,$Actividad,$Comentario,$Horas,$Empresa_Contrata,$ciudad,$Extras);
			echo "<script>alert('el registro de ".$Fecha." con exito');
					 self.location.href='../sections/importar_archivo.php';
				</script>";
		} catch (Exception $e) {
			echo "Se ha producido un error" .$e;
		}
	break;

}
 ?>
