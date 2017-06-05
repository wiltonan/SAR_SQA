<?php 
	require_once '../../model/connection.php';
   	require_once '../../model/hoja_vida.php';
   	require_once '../plugins/tcpdf/tcpdf.php';

   	$Mis_datos = hoja_vida::datos_personales($_GET["usuario"]);
    $laboral = hoja_vida::datos_laborales($_GET["usuario"]);
    $estudioc = hoja_vida::datos_estudiosc($_GET["usuario"]);
    $estudiot = hoja_vida::datos_estudiost($_GET["usuario"]);
    $estudiop = hoja_vida::datos_estudiosp($_GET["usuario"]);
    $estudioi = hoja_vida::datos_estudiosi($_GET["usuario"]);

  class MYPDF extends TCPDF {
    public function Header() {
      // Logo
      $image_file = K_PATH_IMAGES.'encabezados.png';
      $this->Image($image_file, 10, 7, 190, '', 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
      // Position at 15 mm from bottom
      $this->SetY(-15);
      // Set font
      $this->SetFont('helvetica', 'I', 8);
      // Page number
      $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
  }

  $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Wilton andres acuña requena');
$pdf->SetTitle('Mi hoja de vida ');
$pdf->SetSubject('Hoja de vida');
$pdf->SetKeywords('hoja, vida');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('', 'B', 10);
// add a page
$pdf->AddPage();

if ($Mis_datos) {
  foreach ($Mis_datos as $perso) {
    $pdf->Cell(181,5,$perso[0]." ".$perso[1],0,0,'C');
    $pdf->Ln(5);
    $pdf->SetFont('', '', 10);
    $pdf->Cell(181,5,$perso[6]." ".$perso[5]." ".$perso[8],0,0,'C');
    $pdf->Ln(5);

    $pdf->Cell(181,0,"____________________________________________________________________________________________",0,0,'C'); 
    $pdf->Ln(10);
  }
}

if ($estudioc) {
  $pdf->SetFont('', 'B', 12);
  $pdf->SetFillColor(255,255,255);
  $pdf->SetTextColor(255,255,255);  // Establece el color del texto
  $pdf->SetFillColor(127, 179, 213); // establece el color del fondo de la celda
  $pdf->Cell(181,5,'INFORMACIÓN ACADEMICA',0,0, 'C', True);
  $pdf->Ln(10);

  $pdf->SetTextColor(255,255,255); // Establece el color del texto
  $pdf->SetFillColor(127, 179, 213); // establece el color del fondo de la celda
  $pdf->Cell(78, 5,'TITULO OBTENIDO', 0, 0, 'C', True);
  $pdf->Cell(68, 5,'INSTITUCIÓN', 0, 0, 'C', True);
  $pdf->Cell(35, 5,'FECHA', 0, 0, 'C', True);
  $pdf->Ln(5);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Cell(181,0,"____________________________________________________________________________",0);
  $pdf->Ln(6);


  foreach ($estudioc as $estu) {
      if ($estu[7]=="Técnico" || $estu[7]=="Tecnologia" || $estu[7]=="Pregrado" || $estu[7]=="Postgrado") {

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetFont('', '', 10);

        $pdf->MultiCell(86, 5,$estu[0], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5,$estu[1], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(39, 5,$estu[2]."-".$estu[3], 0, 'L', 0, 0, '', '', true);
        $pdf->Ln(7);

        $pdf->Cell(185,0,"____________________________________________________________________________________________",0); 
        $pdf->Ln(5);
      }
    }
  }

  if ($laboral) {
    $pdf->Ln(3);
    $pdf->SetFont('', 'B', 12);
    $pdf->SetTextColor(255,255,255);  
    $pdf->SetFillColor(127, 179, 213);
    $pdf->Cell(181, 5,'EXPERIENCIA LABORAL', 0, 0, 'C', True);
    $pdf->Ln(10);
    foreach ($laboral as $baro) {
      // establece el color del fondo de la celda
      $pdf->SetTextColor(255,255,255);
      $pdf->SetFillColor(255,255,255);
      $pdf->SetFillColor(127, 179, 213);
      $pdf->Cell(93, 5,$baro[0], 0, 0, '', True);
      $pdf->Ln(8);

      $pdf->SetTextColor(0, 0, 0);
      $pdf->SetFillColor(255,255,255);

      $pdf->SetFont('', '', 10);
      $pdf->Cell(61, 5,'Cargo', 1, 0, '', True);
      $pdf->Cell(120, 5,$baro[1], 1, 0, '', True);
      $pdf->Ln(5);

      $pdf->Cell(61, 5,'Fechas', 1, 0, '', True);
      $pdf->Cell(120, 5,$baro[2]." - ".$baro[3], 1, 0, '', True);
      $pdf->Ln(10);
    }
  }

  if ($estudiot) {
    $pdf->Ln(3);
    $pdf->SetFillColor(127, 179, 213);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('', 'B', 12);
    $pdf->Cell(181,5,'CURSOS Y SEMINARIO',0,0, 'C', True);
    $pdf->Ln(10);

    $pdf->Cell(78, 5,'TITULO OBTENIDO', 0, 0, 'C', True);
    $pdf->Cell(68, 5,'INSTITUCIÓN', 0, 0, 'C', True);
    $pdf->Cell(35, 5,'FECHA', 0, 0, 'C', True);
    $pdf->Ln(5);

    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(181,0,"____________________________________________________________________________",0);
    $pdf->Ln(6);

    foreach ($estudiot as $estu) {
      if ($estu[7]=="Seminario" || $estu[7]=="Curso") {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetFont('', '', 10);
        $pdf->MultiCell(86, 5,$estu[0], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5,$estu[1], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(39, 5,$estu[2]."-".$estu[3], 0, 'L', 0, 0, '', '', true);
        $pdf->Ln(5);
        $pdf->Cell(185,0,"____________________________________________________________________________________________",0); 
        $pdf->Ln(5);
      }
    }
  }

  if ($estudiop) {
    $pdf->Ln(3);
    $pdf->SetTextColor(255,255,255);  // Establece el color del texto
    $pdf->SetFillColor(127, 179, 213); // establece el color del fondo de la celda
    $pdf->SetFont('', 'B', 12);
    $pdf->Cell(181,5,'IDIOMAS',0,0, 'C', True);
    $pdf->Ln(10);

    $pdf->SetTextColor(255,255,255); // Establece el color del texto
    $pdf->SetFillColor(127, 179, 213); // establece el color del fondo de la celda
    $pdf->Cell(60, 5,'TITULO OBTENIDO', 0, 0, 'C', True);
    $pdf->Cell(62, 5,'INSTITUCIÓN', 0, 0, 'C', True);
    $pdf->Cell(15, 5,'NIVEL', 0, 0, 'C', True);
    $pdf->Cell(44, 5,'FECHA', 0, 0, 'C', True);
    $pdf->Ln(5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(181,0,"____________________________________________________________________________",0);
    $pdf->Ln(6);

    foreach ($estudiop as $estu) {
      if ($estu[7]=="Idioma") {
        $pdf->SetTextColor(0, 0, 0); // Establece el color del texto
        $pdf->SetFillColor(255,255,255); //color del fondo de la celda
        $pdf->SetFont('', '', 10);

        $pdf->MultiCell(60, 5,$estu[0], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(67, 5,$estu[1], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(15, 5,$estu[6], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(39, 5,$estu[2]."-".$estu[3], 0, 'L', 0, 0, '', '', true);
        $pdf->Ln(5);
        $pdf->Cell(181,0,"___________________________________________________________________________________________",0);
        $pdf->Ln(6);
      }
    }
  }

  if ($estudioi) {
    $pdf->Ln(3);  
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(127, 179, 213); 
    $pdf->SetFont('', 'B', 12);
    $pdf->Cell(181,5,utf8_decode('PLATAFORMAS'),0,0, 'C', True);
    $pdf->Ln(5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(181,0,"____________________________________________________________________________",0);
    $pdf->Ln(6);

    foreach ($estudioi as $estu) {
      if ($estu[7]=="Plataformas") {
        $pdf->SetTextColor(0, 0, 0); // Establece el color del texto
        $pdf->SetFillColor(255,255,255); //color del fondo de la celda
        $pdf->SetFont('', '', 10);
        $pdf->MultiCell(76, 5,$estu[0], 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(110, 5,$estu[4], 0, 'L', 0, 0, '', '', true);
        $pdf->Ln(5);
        $pdf->Cell(181,0,"___________________________________________________________________________________________",0);
        $pdf->Ln(6);
      }
    }
  }
   $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(127, 179, 213); 
    $pdf->SetFont('', 'B', 12);
    $pdf->Cell(181,5,utf8_decode('Anexos'),0,0, 'C', True);

  $pdf->Output('Hoja de vida.pdf ','I');
?>