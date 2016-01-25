<?php
require './lib/php/fpdf/fpdf.php';
require '../admin/lib/php/db_pg.php';
require '../admin/lib/php/classes/catpdf.class.php';
require '../admin/lib/php/classes/catpdfManager.class.php';
$buffer=  ob_get_clean();

$db = Connexion::getInstance($dsn,$user,$pass);


$mg = new catpdfManager($db);
$data = $mg->getCataloguepdf();

$pdf=new FPDF('P','cm','A4');
$pdf->AddPage();

$pdf->SetFillColor(154,111,69);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0); 
$pdf->SetFont('Arial','B',18);
//$pdf->cell(3,3,$pdf->Image('../admin/images/ban_pdf.jpg',0,0),0,0,'L');
$pdf->Ln();
$pdf->cell(3.5,1,'Catalogue de SmartGames',0,0,'L');
$pdf->SetFont('Arial','B',9);
$pdf->Ln();

$pdf->cell(3,.7,'Titre',1,0,'C');
$pdf->cell(13,.7,'Description',1,0,'C');
$pdf->cell(3,.7,'Prix',1,0,'C');
$pdf->Ln();

for($i=0;$i<count($data);$i++) {
        $titre=$data[$i]->nom;
        $prix=$data[$i]->description;
        $nj=$data[$i]->prix;
  
   
    $pdf->cell(3,.7,utf8_decode($titre),1,0,'C');

    $pdf->cell(13,.7,utf8_decode($prix),1,0,'C');
  
        $pdf->cell(3,.7,utf8_decode($nj),1,0,'C');

        $pdf->Ln();

    
}

$pdf->output();

?>