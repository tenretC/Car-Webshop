<?php

require '../lib/php/dbConnectMysql.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/VoitureDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);


// recuperation des données
$obj = new VoitureDB($cnx);
$liste = $obj->getAllVoiture();
$nbrG = count($liste);

require '../lib/php/fpdf/fpdf.php';

$pdf = new FPDF('P', 'cm', 'A4'); // P pour format portrait , cm pour la hauteur de page, de ligne et A4 pour la taille de la page
$pdf->SetFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->setX(8.5);
//sous_titre
$pdf->SetFillColor(0,51,102);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->setXY(2, 2);
$pdf->cell(17, .7, UTF8_decode('Tous nos modèles'), 0, 0, 'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);

$x = 1.5;
$y = 3;
$pdf->setXY($x, $y);
$pdf->SetFont('Arial', 'B', '12');
$pdf->SetXY($x+0.75,$y);
$pdf->cell(4, 1, utf8_decode('Modèle'), 0, 0, 'L');
$pdf->cell(4, 1, 'Prix', 0, 0, 'L');
$pdf->cell(6, 1, 'Description', 0, 0, 'L');
$pdf->cell(6, 1, utf8_decode('Image'), 0, 0, 'L');

$pdf->SetFont('Arial', '',12);
$y = $y +2;
for($i=0;$i<$nbrG;$i++){ // on met 5 au lieu $nbrG pcq on a pas les images WEDDING
    $pdf->setXY($x,$y);
    $pdf->cell(3,1,$liste[$i]['modele'],0,0,'C');
    $pdf->SetXY($x+5,$y);
    $pdf->cell(1,1,$liste[$i]['prix'].' eur',0,0,'C');
    $pdf->SetXY($x+8.5,$y);
    $pdf->cell(3,1,$liste[$i]['description'],0,0,'C');
    $pdf->Image('../../images/'.$liste[$i]['image'],$x+13.5,$y-0.5,4,'JPG');
    //$pdf->
    
    $y = $y + 2;
}

$pdf->Output();



