<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../vendor/tcpdfv02/tcpdf.php';
require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';


$imes = new ImesManager;
$uid = $_SESSION['user']['id'];
$trainee = $_SESSION['user']['fullname'];
$dateFrom = $_POST['dateFrom'] ."00:00:00";
$fromTxt = date('M d, Y', strtotime($dateFrom));
$dateFrom = date('Y-m-d H:i:s', strtotime($dateFrom));
$dateTo = $_POST['dateTo'] ."23:59:59";
$toTxt = date('M d, Y', strtotime($dateTo));
$dateTo = date('Y-m-d H:i:s', strtotime($dateTo));
$supervisor = $_POST['supervisorName'];
$position = $_POST['supervisorPosition'];

$data = ['id' => $uid, 'dateFrom' => $dateFrom, 'dateTo'=> $dateTo];

$journals = json_decode($imes->fetchMyJournal($data), true);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('IMES');
$pdf->SetAuthor('IMES');
$pdf->SetTitle('ACCOMPLISHMENT REPORT');
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
// $html = file_get_contents(htmlentities('print.html.php'));

$html = generateHeader($fromTxt, $toTxt);
$pdf->writeHTML($html, true, false, true, false, '');

$html = generateDetails($journals);
$pdf->writeHTML($html, true, false, true, false, '');

$html = generateFooter($trainee, $supervisor, $position);
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();
$pdf->Output('ssc_report.pdf', 'I');

function generateHeader($from, $to)
{
	$html = '<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:12pt;">';
	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>ACCOMPLISHMENT REPORT</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align: center;"><b>'.$from. ' - '.$to.'</b></td>';
	$html.= '</tr>';
	$html.= '</table>';

	return $html;
}

function generateDetails($data) 
{
	$html = '<table class="table table-bordered" border="1" cellspacing="1" cellpadding="5" style="font-size:10.5pt;">';
	
	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>DATE</b></td>';
	$html.= '<td style="text-align:center;"><b>ACTIVITY</b></td>';
	$html.= '<td style="text-align:center;"><b>STATUS</b></td>';
	$html.= '</tr>';

	foreach ($data as $key => $dd) {
		$html.= '<tr nobr="true">';
		
		$html.= '<td>';
		$html.= $dd['start_date'];
		$html.= '</td>';
		
		$html.= '<td>';
		$html.= $dd['title'];
		$html.= '</td>';
		
		$html.= '<td>';
		$html.= $dd['status'];
		$html.= '</td>';
		
		$html.= '</tr>';
	}
	$html.='</table>';

	return $html;
}

function generateFooter($trainee, $supervisor, $position)
{
	$html = '<table class="table" cellspacing="1" cellpadding="5" style="font-size:12pt;">';
	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>Submitted By:</b></td>';
	$html.= '<td style="text-align:center;"><b>Noted By:</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:center;">&nbsp;<br><br>'.$trainee.'<br>Trainee</td>';
	$html.= '<td style="text-align:center;">&nbsp;<br><br>'.$supervisor.'<br>'.$position.'</td>';
	$html.= '</tr>';

	$html.= '</table>';

	return $html;
}
