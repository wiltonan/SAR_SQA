<?php
require_once '../../model/connection.php';
  require_once '../../model/ejemplo.php';
  require ('../plugins/pdf/fpdf.php');

  $generar = ejemplo::GenerarPDF($_GET["Consulta"]);
          	class PDF extends FPDF
          	{
          		// Cabecera de página, mejor dicho la parte del titulo
          		function Header(){
          			$this->Image('../images/exacto.jpg',15,10,185);
          		    // tipo de letra y grandor del titulo
          		    $this->SetFont('Arial','B',25);
          		    // Movernos a la derecha, este es la posicion del titulo
          		    $this->Cell(70);

          		    // Salto de línea, es como el enter en word. Este es el ceparador del titulo y el parrafo.
          		    $this->Ln(42);
          		}

            		// Pie de página, numero que aparece abajo.
            		function Footer(){
            		    // Posición: a 1,5 cm del final,
            		    $this->SetY(-15);
            		    // Tipo de  letra y grandor
            		    $this->SetFont('Arial','',8);
            		    // Número de página.

            		    $this->Cell(0,0,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
            		}

            	}

              // Creación del objeto de la clase heredada, lo que se va ha mostrar.
              	$pdf = new PDF();
              	$pdf->AddPage();
              	$pdf->SetFont('Arial','',12);

                foreach ($generar as $row ) {
                  # code...
                }

      	$pdf->Cell(192,30,'Software Quality Assurance S.A - SQA S.A
    		 NIT 811.042.907-7',1,7,'C',0);
    		$pdf->Cell(45,6,'Fecha ',1,0,'C',0);
    	 	$pdf->Cell(147,6,$row['Fecha'],1,1,'C',0);
    		$pdf->Cell(45,6,'Periodo de Reporte',1,0,'C',0);
    	 	$pdf->Cell(45,6,$row['Fecha'],1,0,'C',0);
    		$pdf->Cell(32,6,'',1,0,'C',0);
    		$pdf->Cell(45,6,$row['Fecha'],1,0,'C',0);
    		$pdf->Cell(25,6,'',1,1,'C',0);
    		$pdf->Cell(45,6,'Proyecto',1,0,'C',0);
    		$pdf->Cell(147,6,$row['Empresa_Contrata'],1,1,'C',0);
    	  $pdf->Cell(45,6,'Nombre Completo',1,0,'C',0);
    		$pdf->Cell(147,6,$row['Analista'],1,1,'C',0);

    		$pdf->Cell(45,6,'Cedula',1,0,'C',0);
    		$pdf->Cell(147,6,$row['Num_documento'],1,1,'C',0);
    		$pdf->Cell(45,6,'Cargo',1,0,'C',0);
    		$pdf->Cell(147,6,$row['Nombre_Cargo'],1,1,'C',0);
    		$pdf->Cell(192,4,'',1,1,'C',0);

	  //-----------------------------------------


    		$pdf->Cell(20,19,'dia',1,0,'C',0);
    		$pdf->Cell(70,19,'Horas Extras Ordinarias',1,0,'C',0);
    		$pdf->Cell(70,19,'DOMINICALES Y FESTIVOS',1,0,'C',0);

    		$pdf->Cell(32,19,'recargo',1,1,'C',0);
    		$pdf->Cell(20,5,'',1,0,'C',0);
    		$pdf->Cell(40,5,'diurnos',1,0,'C',0);
    		$pdf->Cell(30,5,'nocturnos',1,0,'C',0);
    		$pdf->Cell(32,5,'diurnos',1,0,'C',0);
    		$pdf->Cell(38,5	,'nocturnos',1,0,'C',0);

    		$pdf->Cell(32,5,'nocturnos',1,1,'C',0);
    		$pdf->SetFont('Arial','',10);

    		$pdf->Cell(20,6,'1',1,0,'C');
    		$pdf->Cell(40,6,$row['horas'],1,0,'C');
    		$pdf->Cell(30,6,'8',1,0,'C');
    		$pdf->Cell(32,6,'5',1,0,'C');

    		$pdf->Cell(38,6,'',1,0,'C');
    		$pdf->Cell(32,6,$row['horas'],1,1,'C');
    		$pdf->Cell(20,6,'2',1,0,'C');
    		$pdf->Cell(40,6,'',1,0,'C');
    		$pdf->Cell(30,6,$row['horas'],1,0,'C');
    		$pdf->Cell(32,6,'',1,0,'C');

    		$pdf->Cell(38,6,$row['horas'],1,0,'C');
    		$pdf->Cell(32,6,'6',1,1,'C');
    		$pdf->Cell(20,6,'3',1,0,'C');
    		$pdf->Cell(40,6,'',1,0,'C');
    		$pdf->Cell(30,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,0,'C');

    		$pdf->Cell(38,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,1,'C');
    		$pdf->Cell(20,6,'4',1,0,'C');
    		$pdf->Cell(40,6,'',1,0,'C');
    		$pdf->Cell(30,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,0,'C');

    		$pdf->Cell(38,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,1,'C');
    		$pdf->Cell(20,6,'5',1,0,'C');
    		$pdf->Cell(40,6,'',1,0,'C');
    		$pdf->Cell(30,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,0,'C');

    		$pdf->Cell(38,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,1,'C');
    		$pdf->Cell(20,6,'6',1,0,'C');
    		$pdf->Cell(40,6,'',1,0,'C');
    		$pdf->Cell(30,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,0,'C');

    		$pdf->Cell(38,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,1,'C');
    		$pdf->Cell(20,6,'7',1,0,'C');
    		$pdf->Cell(40,6,'',1,0,'C');
    		$pdf->Cell(30,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,0,'C');

    		$pdf->Cell(38,6,'',1,0,'C');
    		$pdf->Cell(32,6,'',1,1,'C');
    		$pdf->Cell(20,6,'total',1,0,'C');
    		$pdf->Cell(40,6,'0',1,0,'C');
    		$pdf->Cell(30,6,'0',1,0,'C');
    		$pdf->Cell(32,6,'0',1,0,'C');

    		$pdf->Cell(38,6,'0',1,0,'C');
    		$pdf->Cell(32,6,'0',1,1,'C');

	$pdf->Output();
?>
