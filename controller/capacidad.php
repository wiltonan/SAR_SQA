<?php
	require_once '../model/connection.php';
	require_once '../model/capacidad.php';

	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	$datos=$_REQUEST['actualiz'];
	switch ($datos) {
		case 'Actualizar':
			$nombre = $_POST['nombres'];
			$apellido = $_POST['apellidos'];
			$ubicacion = $_POST['ubicacion'];
			$idcargo= $_POST['cargo'];
			$facturacion =$_POST['facturacion'];
			$idrol = $_POST['rol'];
			$idcliente = $_POST['cliente'];
			$idnovedad = $_POST['novedad'];
			$idservicio =$_POST['servicio'];
			$idciudad = $_POST['ciudad'];
			$obser = $_POST['observacion'];
			$iden = $_POST['iden'];
			$codigo = $_POST['cod'];


			try {
				capacidad::Actualiza_Capacidad($nombre,$apellido,$ubicacion,$idcargo,$facturacion,$idrol,$idcliente,$idnovedad,$idservicio,$idciudad,$obser,$codigo);

				echo "<script>alert('La informacion se ha actualizado con exito');
				       		self.location.href='../view/menu/administrador.php#/consul_capacidad';
				   		</script>";

			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}


			break;

			case '':
				# code...
				break;
	}
 ?>
