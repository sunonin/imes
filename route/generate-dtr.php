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

$student = json_decode($imes->fetchStudent($uid), true);
$dtrs = json_decode($imes->fetchMyDtr($data), true);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('IMES');
$pdf->SetAuthor('IMES');
$pdf->SetTitle('DAILY TIME RECORD');
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

$html = generateHeader($fromTxt, $toTxt, $student);
$pdf->writeHTML($html, true, false, true, false, '');

$html = generateDetails($dtrs);
$pdf->writeHTML($html, true, false, true, false, '');

$html = generateFooter($trainee, $supervisor, $position, $student['ojt_coordinator']);
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();
$pdf->Output('ssc_report.pdf', 'I');

function generateHeader($from, $to, $student)
{
	$html = '<table class="table table-bordered" border="1" cellspacing="1" cellpadding="5" style="font-size:8pt;">';
	$html.= '<tr>';
	$html.= '<td style="text-align:center;" colspan="2"><b>ON THE JOB TRAINING TIME FRAME</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td><b>Name of Trainee:</b> <br>'.$student['fullname'].'</td>';
	$html.= '<td><b>Year / Course:</b> <br>4th year /'.$student['fullCourse'].'</td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td colspan="2"><b>Name of Company / Address:</b><br>'.$student['compAddress'].'</td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td colspan="2"><b>Required Number of Hours :</b> '.$student['reqHours'].'</td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align: center;" colspan="2"><b>'.$from. ' - '.$to.'</b></td>';
	$html.= '</tr>';

	$html.= '</table>';

	return $html;
}

function generateDetails($data) 
{
	$html = '<table class="table" border="1" cellspacing="1" cellpadding="5" style="font-size:8pt;">';
	$total = 0;
	$html.= '<tr>';
	$html.= '<td style="text-align:center;" width="35%"><b>DATE</b></td>';
	$html.= '<td style="text-align:center;" width="35%"><b>TIME</b></td>';
	$html.= '<td style="text-align:center;" width="30%"><b>HOURS</b></td>';
	$html.= '</tr>';

	foreach ($data as $key => $dd) {
		$total += $dd['reqHours'];
		$html.= '<tr nobr="true">';
		
		$html.= '<td style="text-align:center;">';
		$html.= $dd['date_in'];
		$html.= '</td>';
		
		$html.= '<td style="text-align:center;">';
		$html.= $dd['time_in'] .' - '.$dd['time_out'];
		$html.= '</td>';

		$html.= '<td style="text-align:center;">';
		$html.= $dd['reqHours'];
		$html.= '</td>';		
		
		$html.= '</tr>';
	}

	$html.= '<tr>';
	$html.= '<td style="text-align:right;" colspan="2"><b>Total Number of Hours</b></td>';
	$html.= '<td style="text-align:center;"><b>'.$total.'</b></td>';
	$html.= '</tr>';

	$html.='</table>';

	return $html;
}

function generateFooter($trainee, $supervisor, $position, $coordinator)
{
	$html = '<table class="table" cellspacing="1" border="1" cellpadding="5" style="font-size:8pt;">';
	$html.= '<tr>';
	$html.= '<td><b>Prepared By:</b></td>';
	$html.= '<td><b>Approved By:</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:center;">&nbsp;<br><br>'.$trainee.'<br>Trainee</td>';
	$html.= '<td style="text-align:center;">&nbsp;<br><br>'.$supervisor.'<br>Company’s Authorized Representative</td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td colspan="2"><b>Reviewed By:</b></td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:center;" colspan="2">&nbsp;<br><br>'.$coordinator.'<br>OJT Coordinator</td>';
	$html.= '</tr>';

	$html.= '</table>';

	return $html;
}
