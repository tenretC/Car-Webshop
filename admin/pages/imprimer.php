<?php

require '../lib/php/dbConnectMysql.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/Vue_gateauxDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

// recuperation des données
$obj = new Vue_GateauxDB($cnx);
$liste = $obj->getVue_gateau();
$nbrG = count($liste);

require '../lib/php/fpdf/fpdf.php';

$pdf = new FPDF('P', 'cm', 'A4'); // P pour format portrait , cm pour la hauteur de page, de ligne et A4 pour la taille de la page
$pdf->SetFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->setX(8.5);
$pdf->cell(3.5, 1, UTF8_decode('Nos pâtisseries'), 0, 0, 'C');
//sous_titre
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->setXY(3, 2);
$pdf->cell(15, .7, UTF8_decode('Pour tout évenement'), 0, 0, 'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);

$x = 3;
$y = 3;
$pdf->setXY($x, $y);
$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(8, 1, utf8_decode('Dénomination'), 0, 0, 'L');
$pdf->cell(4, 1, 'Prix', 0, 0, 'L');
$pdf->cell(5, 1, utf8_decode('Image'), 0, 0, 'L');

$pdf->SetFont('Arial', '',12);
$y = $y +2;
for($i=0;$i<5;$i++){ // on met 5 au lieu $nbrG pcq on a pas les images WEDDING
    $pdf->setXY($x,$y);
    $pdf->cell(3.5,1,$liste[$i]['NOM_GATEAU'],0,0,'C');
    $pdf->SetXY($x+8,$y);
    $pdf->cell(1,1,$liste[$i]['PRIX_UNITAIRE'],0,0,'C');
    $pdf->Image('../../images/'.$liste[$i]['IMAGE'],$x+12,$y,1.5,'JPG');
    
    $y = $y + 2;
}

$pdf->Output();



