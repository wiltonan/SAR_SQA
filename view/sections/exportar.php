<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */



if (PHP_SAPI == 'cli')
	die('Este ejemplo sólo se puede ejecutar desde un navegador Web');

/** Incluye PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Obed Alvarado")
							 ->setLastModifiedBy("Obed Alvarado")
							 ->setTitle("Office 2010 XLSX Documento de prueba")
							 ->setSubject("Office 2010 XLSX Documento de prueba")
							 ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo con resultado de prueba");



							 /*Combino las celdas desde A1 hasta M1*/
							 $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:M1');
							 $objPHPExcel->setActiveSheetIndex(0)
							 			->setCellValue('A1', 'Ciudad')
							 			->setCellValue('B2', 'Nombres y apellidos')
							 			->setCellValue('C2', '# Cedula')
							 			->setCellValue('D2', 'Cargo')
							 			->setCellValue('E2', 'Rol')
							 			->setCellValue('F2', 'Cliente asignado al 30 del mes')
							 			->setCellValue('G2', 'Ubicación fisica')
							 			->setCellValue('H2', 'GP')
							 			->setCellValue('I2', 'Novedad respecto al mes anterior')
							 			->setCellValue('J2', 'Factuta ?')
							 			->setCellValue('K2', '% Facturacion')
							 			->setCellValue('L2', 'Modelo de servicio')
							 			->setCellValue('M2', 'Observaciones');

										/* Fuente de la primera fila en negrita*/
										$boldArray = array('font' => array('bold' => true,),'arial' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

										$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->applyFromArray($boldArray);

										//Ancho de las columnas
										$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
										$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
										$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
										$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
										$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
										$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
										$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
										$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
										$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
										$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8);
										$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(8);
										$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
										$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(50);

/*Extraer datos de MYSQL*/
$con=@mysqli_connect('localhost', 'root', '', 'sqadb');
	 if(!$con){
			 die("imposible conectarse: ".mysqli_error($con));
	 }
	 if (@mysqli_connect_errno()) {
			 die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
	 }
 $sql="CALL Consultar_Datos()";
 $query=mysqli_query($con,$sql);
 $cel=3;//Numero de fila donde empezara a crear  el reporte
while ($row=mysqli_fetch_array($query)){
$Ciudad=$row['Ciudad'];
$NombreCompleto=$row['Nombre completo'];
$Cedula=$row['Num_Documento'];
$Cargo=$row['Cargo'];
$Rol=$row['Rol'];
$Cliente=$row['Cliente'];
$Ubicacion=$row['Ubicacion'];
$Novedad=$row['Novedad'];
$Gerente=$row['Gerente de proyectos'];
$Factura=$row['Factura'];
$Facturacion=$row['Facturacion'];
$servicio=$row['Servicio'];
$Observaciones=$row['Observaciones'];
 $a="A".$cel;
 $b="B".$cel;
 $c="C".$cel;
 $d="D".$cel;
 $e="E".$cel;
 $f="F".$cel;
 $g="G".$cel;
 $h="H".$cel;
 $i="I".$cel;
 $j="J".$cel;
 $k="K".$cel;
 $l="L".$cel;
 $m="M".$cel;

			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $Ciudad)
            ->setCellValue($b, $NombreCompleto)
            ->setCellValue($c, $Cedula)
            ->setCellValue($d, $Cargo)
						->setCellValue($e, $Rol)
						->setCellValue($f, $Cliente)
						->setCellValue($g, $Ubicacion)
						->setCellValue($h, $Novedad)
						->setCellValue($i, $Gerente)
						->setCellValue($j, $Factura)
						->setCellValue($k, $Facturacion)
						->setCellValue($l, $servicio)
						->setCellValue($m, $Observaciones);

	$cel+=1;
	}

/*Fin extracion de datos MYSQL*/
$rango="A2:$e";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte Analista');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
