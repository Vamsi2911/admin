<?php

require('fpdf.php');
include("../db.php");
//include("../auth.php");
session_start();
if ($_SESSION['username']=="") {
    echo "<script>location.href='../';</script>";
}

if ($_GET['print_php']!="") {
    $qid = base64_decode($_GET['print_php']);
}
else if ($_SESSION['id']!="") {
    $qid = $_SESSION['id'];
}

$result = mysqli_query($con, "select * from spot_registration where id='".$qid."' ");
$fetch = mysqli_fetch_array($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$pdf->Image('../images/veda recipt.jpg',0,0,210);


//*****************************************//
//                let side part 
//******************************************//
//Date left
$pdf->setXY(80,26.8);
$pdf->Cell(0,0,date('d/m/y'));


//receipt id
$pdf->SetFont('Arial','b',10);
$pdf->setXY(40,27);
$pdf->Cell(0,0,$fetch['receipt_id']);


$pdf->SetFont('Arial','',9);
//rollno
$pdf->setXY(40,33.5);
$pdf->Cell(0,0,$fetch['student_code']);

//name
$pdf->setXY(40,40);
$pdf->Cell(0,0,substr($fetch['student_name'], 0, 28));

//college
$pdf->setXY(40,46.3);
$pdf->Cell(0,0,substr($fetch['college'], 0, 28));

//mobile
$pdf->setXY(40,52.6);
$pdf->Cell(0,0,$fetch['mobile']);

//email
$pdf->setXY(40,59);
$pdf->Cell(0,0,substr($fetch['email'], 0, 28));

//dept
$pdf->setXY(40,65.4);
$pdf->Cell(0,0,$fetch['section']);

//event
$pdf->setXY(40,71.5);
$pdf->Cell(0,0,strtoupper(substr($fetch['event_name'], 0, 28)));

//fee
$pdf->setXY(40,78);
$pdf->Cell(0,0,$fetch['fee']);

//rupee icon image
$pdf->Image('../icons/rupee-icon.png',45+strlen($fetch['fee']),76.6,1.7);


//*****************************************//
//                right side part 
//******************************************//
//Date right
$pdf->setXY(185,26.8);
$pdf->Cell(0,0,date('d/m/y'));



//receipt id
$pdf->SetFont('Arial','b',10);
$pdf->setXY(145,27);
$pdf->Cell(0,0,$fetch['receipt_id']);

$pdf->SetFont('Arial','',9);
//rollno
$pdf->setXY(145,33.5);
$pdf->Cell(0,0,$fetch['student_code']);

//name
$pdf->setXY(145,40);
$pdf->Cell(0,0,substr($fetch['student_name'], 0, 28));

//college
$pdf->setXY(145,46.4);
$pdf->Cell(0,0,substr($fetch['college'], 0, 28));

//dept
$pdf->setXY(145,52.3);
$pdf->Cell(0,0,$fetch['section']);

//event
$pdf->setXY(145,58.5);
$pdf->Cell(0,0,strtoupper(substr($fetch['event_name'], 0, 28)));

//fee
$pdf->setXY(145,65.1);
$pdf->Cell(0,0,$fetch['fee']);

//rupee icon image
$pdf->Image('../icons/rupee-icon.png',150+strlen($fetch['fee']),64,1.6);


//location
$pdf->setXY(145,71.3);
$pdf->Cell(0,0,substr($fetch['location'], 0, 28));



$pdf->Output();
?>


<!--
<?php

/*
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../../../veda recipt.jpg',0,0,210);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    //$this->Cell(30,10,'Title',1,0,'C');
    // Line break
    ///$this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    //$this->SetFont('Arial','I',8);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    //$pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
*/





/*

$html = 'You can now easily print text mixing different styles: <b>bold</b>, <i>italic</i>,
<u>underlined</u>, or <b><i><u>all at once</u></i></b>!<br><br>You can also insert links on
text, such as <a href="http://www.fpdf.org">www.fpdf.org</a>, or on an image: click on the logo.';

$pdf = new PDF();
// First page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,"To find out what's new in this tutorial, click ");
$pdf->SetFont('','U');
$link = $pdf->AddLink();
$pdf->Write(5,'here',$link);
$pdf->SetFont('');
// Second page
$pdf->AddPage();
$pdf->SetLink($link);
$pdf->Image('logo.png',10,12,30,0,'','http://www.fpdf.org');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output();*/
?>-->