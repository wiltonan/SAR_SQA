<?php 
	require_once '../model/connection.php';
	require_once '../model/hoja_vida.php';

	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	$rcvd=$_REQUEST['ctn'];
	switch ($rcvd) {
		// este es para crear un usuario nuevo
		case 'Rdstrr_sr':
			$tip_docu=$_POST['tp_dcmnt'];
			$privilegio=$_POST['prvlg'];
			$cedu=$_POST['cdl'];
			$lugar_expedicion="de ".ucwords($_POST['Lgr_xpdcn']);
			$nick=$_POST['nck'];
			$nick1=sha1($_POST['nck']);
			$contra=crypt($_POST['cntrsn'],$nick1);
			$correo=$_POST['crr'];
			$est='1';
			try {
				$vl = hoja_vida::cnsltr_xstnc($cedu);
				if ($vl == "") {
					$vl1 = hoja_vida::cnsltr_xstnc1($nick);
					if ($vl1 == "") {
						hoja_vida::crr_sr($tip_docu,$privilegio,$cedu,$lugar_expedicion,$nick,$contra,$correo,$est);
					 	echo "<script>alert('La cedula ".$cedu." se ha registrado con exito');
					       self.location.href='../view/menu/Administrador.php#/usuario_crear';
					    </script>";
					}else{
						echo "<script>alert('El nick ".$nick." ya  existe');
					       self.location.href='../view/menu/Administrador.php#/usuario_crear';
					    </script>";
					}
				}else{
					echo "<script>alert('La cedula ".$cedu." ya  existe');
					       self.location.href='../view/menu/Administrador.php#/usuario_crear';
					    </script>";
				}
				
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;


		// este es para agregarle la hoja de vida al usuario
		case 'rgstrr_crr_cv':
			$car=$_POST['crg'];
			$rol=$_POST['rl'];
			$dire_docu=$_POST['drccn_dcmnts'];
			$usua=$_POST['sr_cv'];

			// if ($usua==NULL and $dire_docu=="") {
			// 	echo "<script>alert('Por favor llene todos los campos');
			// 		       self.location.href='../view/menu/Th.php#/crear';
			// 		    </script>";
			// }
			try {
				hoja_vida::crr_cv($car, $rol, $dire_docu, $usua);
				 echo "<script>alert('La hoja de vida se ha asignado con exito');
				       self.location.href='../view/menu/Administrador.php#/asignar_cv';
				    </script>";
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;

		// este es para registrar la información personal de usuario
		case 'rgstrr_psnl':
			$nombres=strtoupper($_POST['nmbrs']);
			$apellidos=strtoupper($_POST['pllds']);
			$telefono=$_POST['tlfn'];
			$celular=$_POST['cllr'];
			$cod=$_POST['nd'];

			try {
				hoja_vida::prsnl($nombres, $apellidos, $telefono, $celular, $cod);
				 echo "<script>alert('La informacion se ha registrado con exito');
				       		self.location.href='../view/menu/Administrador.php#/Datos_personales';
				   		</script>";
				
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;

		// este es para agregar la experiencia laboral
		case 'rgstrr_lbrl':
			$cod=$_POST['nd'];
			$sector=$_POST['sctr'];
			$es_sqa=$_POST['sqa'];
			$empresa=utf8_encode(ucwords($_POST['mprs']));
			$cargo=utf8_encode(ucwords($_POST['crg']));
			$fecha_inicip=$_POST['fch_nc'];
			$fecha_fin=$_POST['fch_fn'];
			$meses_experi=$_POST['mss_xprnc'];
			$celu_conta=$_POST['cllr'];
			try {
				$laboral=hoja_vida::consul_expe_labo($cod, $sector, $empresa, $cargo);
				if ($laboral[0]==$cod && $laboral[1]==$sector && $laboral[2]==$empresa && $laboral[3]==$cargo) {
					echo "<script>alert('Esta experiencia laboral ya la tienes registrada');
					       	self.location.href='../view/menu/Administrador.php#/Agregar_experiencia_laboral';
					   	</script>";
				}else{
					hoja_vida::lbrl($cod, $sector, $es_sqa, $empresa, $cargo, $fecha_inicip, $fecha_fin, $meses_experi, $celu_conta);
						 echo "<script>alert('La informacion se ha registrado con exito');
				       	self.location.href='../view/menu/Administrador.php#/Agregar_experiencia_laboral';
				   	</script>"; 
				}
					
				
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;

		// este es para agregar los estudios
		case 'rgstrr_std':
			$cod=$_POST['nd'];
			$tipo_estudio=$_POST['tp_std'];
			$titulo_obtenido=utf8_encode(ucwords($_POST['ttl_btnd'])); 
			$institucion=ucwords($_POST['nsttcn']);
			$fecha_inicio=$_POST['fch_nc'];
			$fecha_fin=$_POST['fch_fn'];
			$tarjeta_profesional=$_POST['tjt_prfsnl'];
			$obsevacion=ucwords($_POST['bsrvcns']);
			$nivel=$_POST['nvl'];
			try {
				$estudi= hoja_vida::consul_estudio($cod, $titulo_obtenido, $tipo_estudio);

				if ($estudi[0] == $cod && $estudi[1] == $titulo_obtenido && $estudi[2]==$tipo_estudio) {
					echo "<script>alert('Este estudio ya lo tienes registrado');
					       	self.location.href='../view/menu/Administrador.php#/agregar_estudio';
					   	</script>";
				}else{
					hoja_vida::estudio($cod, $tipo_estudio, $titulo_obtenido, $institucion, $fecha_inicio, $fecha_fin, $tarjeta_profesional, $obsevacion,$nivel);
					echo "<script>alert('La informacion se ha registrado con exito');
					    	self.location.href='../view/menu/Administrador.php#/agregar_estudio';
					   	</script>";
				}					
			} catch (Exception $e) {
				echo "Se ha producido un error" .$e;
			}
		break;
	}

 ?>

