<?php
include_once  '../../model/connection.php';
if(isset($_POST["Import"])){
		echo $filename=$_FILES["file"]["tmp_name"];
		 if($_FILES["file"]["size"] > 0)
		 {
        $file = fopen($csv,'r');
        $s=0;
        $c=0;
        $sql="";
	         while (($emapData = fgetcsv($file,1000,",","'")) !== FALSE)
	         {
             if ($emapData[1]) {
         					$c++;
         					$emapData= explode(";", $emapData[1]);
	                 // Se inserta una fila a nuestra tabla de asunto desde nuestro archivo csv
							  $sql = "INSERT INTO temporal_extras (Proyecto, Fecha, Analista, Actividad_Rh, Actividad, Comentario, Horas,Empresa_Contrata, ciudad)
          	     values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]')";

							    // estamos utilizando la función mysql_query. Devuelve un recurso en true else False en error
	             if (mysqli_query($con, $sql)) {
              $s++;

            }else{
              $s=$s-1;
            }
          }
				if(! $result ){
					echo "<script type=\"text/javascript\">
							alert(\"Archivo no válido: cargue el archivo CSV.\");
							window.location = \"..\sections\importar_archivo.php\"
						</script>";}}

	         fclose($file);
	         // lanza un mensaje si los datos se importaron correctamente a la base de datos mysql desde el archivo excel
	         echo "<script type=\"text/javascript\">
						alert(\"El archivo CSV se ha importado correctamente.\");
						window.location = \"..\sections\importar_archivo.php\"
					</script>";
			 //close of connection
			mysql_close($conn);



		 }
	}
?>
