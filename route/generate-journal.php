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

$asd = json_decode($imes->fetchStudent($uid), true);
$compName = $asd['compName'];
$coordinator = $asd['ojt_coordinator'];
$journals = json_decode($imes->fetchMyJournal($data), true);
$ddd = json_decode($imes->fetchDtrList($data), true);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('IMES');
$pdf->SetAuthor('IMES');
$pdf->SetTitle('ACCOMPLISHMENT REPORT');
$pdf->SetKeywords('TCPDF, PDF, todo');
$pdf->setPageOrientation('LANDSCAPE');

// set default header data
$pdf->SetHeaderData('', '0', '', '');

$pdf->SetPrintHeader(false);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 10, 5);
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

// create some HTML content
$tt = $tt2 = '';
$total_hours = $total_hours2 = 0;
$header1 = $header2 = $ff = $ff2 = '';

foreach ($journals as $i => $journal) {
	if ($i == 0) {
		$header1 = $journal['start_dateF'];
	}

	if ($i == 5 ) {
		$header2 = $journal['start_dateF'];
	} 

	if ($i < 5) {
		$tt.= '<tr>';
		$tt.= '<td style="background-color:gray; color:white">Day: '.$journal['day_format'].'</td>';
		$tt.= '<td width="210" rowspan="2">'.$journal['title'].'</td>';
		$tt.= '<td width="50" rowspan="2" style="text-align:center">'.$ddd[$journal['start_date']].'</td>';
		$tt.= '</tr>';
		$tt.= '<tr>';
		$tt.= '<td>Date: '.$journal['start_date'].'</td>';
		$tt.= '</tr>';

		$total_hours += $ddd[$journal['start_date']];

		$ff = $journal['start_date'];
	} else {
		$tt2.= '<tr>';
		$tt2.= '<td style="background-color:gray; color:white">Day: '.$journal['day_format'].'</td>';
		$tt2.= '<td width="210" rowspan="2">'.$journal['title'].'</td>';
		$tt2.= '<td width="50" rowspan="2" style="text-align:center">'.$ddd[$journal['start_date']].'</td>';
		$tt2.= '</tr>';
		$tt2.= '<tr>';
		$tt2.= '<td>Date: '.$journal['start_date'].'</td>';
		$tt2.= '</tr>';

		$total_hours2 += $ddd[$journal['start_date']];
		$ff2 = $journal['start_date'];
	}
}

$header1 = $header1 .' to '. $ff;
$header2 = $header2 .' to '. $ff2;

$html = '
<table cellspacing="3" cellpadding="4">
    <tr>
        <td width="417">

        	<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:8pt;">
				<tr>
					<td style="text-align:center;" colspan="2"><b>TRAINEES WEEKLY REPORT ( Week ___ )</b></td>
				</tr>

				<tr>
					<td style="text-align: center;"><b><u>'.$header1.'</u></b><br>Period Covered</td>
					<td style="text-align: center;"><b><u>'.$compName.'</u></b><br>Department/Section</td>
				</tr>
			</table>

			<table class="table table-bordered" border="1" cellspacing="1" cellpadding="5" style="font-size:9pt;">
				<tr>
					<td></td>
					<td width="210" style="text-align:center">Training Activity</td>
					<td width="50" style="text-align:center">No. of Hours</td>
				</tr>
				'. $tt .'
				<tr style="background-color:gray; color:white">
					<td colspan="2"></td>
					<td style="text-align:center"><b>'.$total_hours.'</b></td>
				</tr>

				<tfoot>
					<tr>
						<td colspan="3">
							<i style="font-size:6pt; color:red">(Signature over Printed Name)</i>
							<p style="text-align:right">Prepared by: <u>'.$trainee.'</u><br>Student-Trainee Signature</p><br>
							<p style="text-align:left">Noted by: <u>'.$supervisor.'</u><br>Training Supervisor</p><br>
							<p style="text-align:right">Approved by: <u>'.$coordinator.'</u><br>Placement Coordinator</p>
						</td>
					</tr>
				</tfoot>
			</table>

        </td>
        <td width="417">

        	<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:8pt;">
				<tr>
					<td style="text-align:center;" colspan="2"><b>TRAINEES WEEKLY REPORT ( Week ___ )</b></td>
				</tr>

				<tr>
					<td style="text-align: center;"><b><u>'.$header2.'</u></b><br>Period Covered</td>
					<td style="text-align: center;"><b><u>'.$compName.'</u></b><br>Department/Section</td>
				</tr>
			</table>

			<table class="table table-bordered" border="1" cellspacing="1" cellpadding="5" style="font-size:9pt;">
				<tr>
					<td></td>
					<td width="210" style="text-align:center">Training Activity</td>
					<td width="50" style="text-align:center">No. of Hours</td>
				</tr>
				'. $tt2 .'
				<tr style="background-color:gray; color:white">
					<td colspan="2"></td>
					<td style="text-align:center"><b>'.$total_hours2.'</b></td>
				</tr>

				<tfoot>
					<tr>
						<td colspan="3">
							<i style="font-size:6pt; color:red">(Signature over Printed Name)</i>
							<p style="text-align:right">Prepared by: <u>'.$trainee.'</u><br>Student-Trainee Signature</p><br>
							<p style="text-align:left">Noted by: <u>'.$supervisor.'</u><br>Training Supervisor</p><br>
							<p style="text-align:right">Approved by: <u>'.$coordinator.'</u><br>Placement Coordinator</p>
						</td>
					</tr>
				</tfoot>
			</table>

        </td>
        <td width="170">
			<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:10pt;">
				
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
						<p><br>
						<b>Reminder:</b><br>Regular Hours: <b>8 per day / 40 per week</b><br>
						W/ OT Letter: <b>9-10 hours per day ONLY / 50 hours per week only</b><br><br>
						==================<br><br>
						Pls. <b style="color:red">compute and write</b> the total # of hours per week at the bottom of No. of Hrs.
						</p>
					</td>
				</tr>
			</table>        	
        </td>
    </tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');




$pdf->lastPage();
$pdf->Output('ssc_report.pdf', 'I');

// function generateHeader($from, $to)
// {
// 	$html = '<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:12pt;">';
// 	$html.= '<tr>';
// 	$html.= '<td style="text-align:center;"><b>ACCOMPLISHMENT REPORT</b></td>';
// 	$html.= '</tr>';

// 	$html.= '<tr>';
// 	$html.= '<td style="text-align: center;"><b>'.$from. ' - '.$to.'</b></td>';
// 	$html.= '</tr>';
// 	$html.= '</table>';

// 	return $html;
// }

// function generateDetails($data) 
// {
// 	$html = '<table class="table table-bordered" border="1" cellspacing="1" cellpadding="5" style="font-size:10.5pt;">';
	
// 	$html.= '<tr>';
// 	$html.= '<td style="text-align:center;"><b>DATE</b></td>';
// 	$html.= '<td style="text-align:center;"><b>ACTIVITY</b></td>';
// 	$html.= '<td style="text-align:center;"><b>STATUS</b></td>';
// 	$html.= '</tr>';

// 	foreach ($data as $key => $dd) {
// 		$html.= '<tr nobr="true">';
		
// 		$html.= '<td>';
// 		$html.= $dd['start_date'];
// 		$html.= '</td>';
		
// 		$html.= '<td>';
// 		$html.= $dd['title'];
// 		$html.= '</td>';
		
// 		$html.= '<td>';
// 		$html.= $dd['status'];
// 		$html.= '</td>';
		
// 		$html.= '</tr>';
// 	}
// 	$html.='</table>';

// 	return $html;
// }

// function generateFooter($trainee, $supervisor, $position)
// {
// 	$html = '<table class="table" cellspacing="1" cellpadding="5" style="font-size:12pt;">';
// 	$html.= '<tr>';
// 	$html.= '<td style="text-align:center;"><b>Submitted By:</b></td>';
// 	$html.= '<td style="text-align:center;"><b>Noted By:</b></td>';
// 	$html.= '</tr>';

// 	$html.= '<tr>';
// 	$html.= '<td style="text-align:center;">&nbsp;<br><br>'.$trainee.'<br>Trainee</td>';
// 	$html.= '<td style="text-align:center;">&nbsp;<br><br>'.$supervisor.'<br>'.$position.'</td>';
// 	$html.= '</tr>';

// 	$html.= '</table>';

// 	return $html;
// }

function generateDetails($data) 
{
	$html = '<table class="table table-bordered" border="1" cellspacing="1" cellpadding="5" style="font-size:10.5pt;">';
	
	$html.= '<tr>';
	$html.= '<td style="text-align:center;"><b>DATE</b></td>';
	$html.= '<td style="text-align:center;"><b>ACTIVITY</b></td>';
	$html.= '<td style="text-align:center;"><b>STATUS</b></td>';
	$html.= '</tr>';
	$html.='</table>';

	return $html;
}
