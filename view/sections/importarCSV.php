
<?php
require_once '../model/connection.php';

if ($_FILES['csv']['size'] > 0) {

	$csv = $_FILES['csv']['tmp_name'];

	$handle = fopen($csv,'r');
	$s=0;
	$c=0;
	$sql="";
	while ($data = fgetcsv($handle,1000,",","'")){
		if ($data[0]) {
					$c++;
					$datas= explode(";", $data[0]);
		      		$sql = ("INSERT INTO temporal_extras
		      							(Proyecto,
		      	 						Fecha, Analista, Actividad_Rh,
		      	 						Actividad,Comentario,Horas,
		      	 						Empresa_Contrata,ciudad)
		      							VALUES('".$datas[0]."','".$datas[1]."',
		      								   '".$datas[2]."','".$datas[3]."','".$datas[4]."',
		      								   '".$datas[5]."','".$datas[6]."','".$datas[7]."',
		      								   '".$datas[8]."') ");
			if (mysqli_query($con, $sql)) {
				$s++;
			}else{
				$s=$s-1;
			}
		}
	}
	if ($c==$s) {
		echo "ok";
	}else{
		echo "error";
	}
}
