<html>
<head>
<title>ShotDev.Com Tutorial</title>
</head>
<body>
<?php

require("fpdf.php");

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	$w=array(40,30,55,25,20,20);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
		$this->Cell(40,6,$eachResult["title"],1);
		$this->Cell(30,6,$eachResult["year"],1);
		$this->Cell(55,6,$eachResult["authors"],1);
		$this->Ln();
	}
}

//Better table
function ImprovedTable($header,$data)
{
	//Column widths
	$w=array(20,30,55,25,25,25);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data

	foreach ($data as $eachResult) 
	{
		$this->Cell(20,6,$eachResult["title"],1);
		$this->Cell(30,6,$eachResult["year"],1);
		$this->Cell(55,6,$eachResult["authors"],1);
		$this->Ln();
	}





	//Closure line
	$this->Cell(array_sum($w),0,'','T');
}

//Colored table
function FancyTable($header,$data)
{
	//Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	//Header
	$w=array(20,30,55,25,25,25);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	//Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Data
	$fill=false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles
$header=array('title', 'year', 'authors');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect("localhost:3306","root","") or die(mysql_error());
$objDB = mysql_select_db("test");
$strSQL = "SELECT * FROM serler";
$objQuery = mysql_query($strSQL);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//



$pdf->SetFont('Arial','',10);

//*** Table 1 ***//
$pdf->AddPage();
$pdf->Ln(35);
$pdf->BasicTable($header,$resultData);
ob_end_clean();
$pdf->Output();
?>


</body>
</html>
<!--- This file download from www.shotdev.com -->