<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../vendor/tcpdfv02/tcpdf.php';
require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';


$imes = new ImesManager;

$prg = $_GET['program'];
$sec = $_GET['section'];

$prgs = json_decode($imes->fetchPrograms($prg), true);
$students = json_decode($imes->fetchStudents2($prg, $sec), true);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('IMES');
$pdf->SetAuthor('IMES');
$pdf->SetTitle('STUDENT LIST');
$pdf->SetKeywords('TCPDF, PDF, todo');

// set default header data
$pdf->SetHeaderData('', '0', '', '');

$pdf->SetPrintHeader(false);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
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

$pdf->SetFont('', '', 10);

// add a page
$pdf->AddPage();

$html = generateHeader($prgs, $sec);
$pdf->writeHTML($html, true, false, true, false, '');

$html = generateDetails($students);
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();
$pdf->Output('ssc_report.pdf', 'I');

function generateHeader($prgs, $sec)
{
	$html = '<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:12pt;">';
	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>STUDENT LIST</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>'.$prgs['code'] .' - '.$prgs['major'].'</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>'.$sec.'</b></td>';
	$html.= '</tr>';
	$html.= '</table>';

	return $html;
}

function generateDetails($data) 
{
	$html = '<table class="table" border="1" cellspacing="1" cellpadding="5" style="font-size:9pt;">';
	
	$html.= '<tr>';
	$html.= '<td style="text-align:center;" width="5%"><b>#</b></td>';
	$html.= '<td style="text-align:center;" width="50%"><b>NAME</b></td>';
	$html.= '<td style="text-align:center;" width="45%"><b>GENDER</b></td>';
	$html.= '</tr>';

	foreach ($data as $key => $dd) {
		$html.= '<tr nobr="true">';
		$html.= '<td>';
		$html.= $key+1;
		$html.= '</td>';
		$html.= '<td>';
		$html.= $dd['fullname'];
		$html.= '</td>';
		$html.= '<td>';
		$html.= $dd['gender'];
		$html.= '</td>';
		$html.= '</tr>';
	}
	$html.='</table>';

	return $html;
}
