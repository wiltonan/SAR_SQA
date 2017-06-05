
<?php
require('Multicell.php');


$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);

// de esta forma se crea cuantas columnas va a tener la tabla

 $pdf->Cell(80,8,"holas a todo esto es una prueba",1);
 $pdf->Ln(8);

for($i=0;$i<20;$i++)
    $pdf->Row(array(102,8,"dfgsdgnjsdbfgj sadjfghashasdhgsadbfdsjkgb",1));
    $pdf->Row(array("dfgsdgnjsdbfgj sadjfghashasdhgsadbfdsjkgb",1));

  $pdf->Output();
?>