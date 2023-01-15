<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../vendor/tcpdfv02/tcpdf.php';
require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';

$imes = new ImesManager;
$sid = $_GET['sid'];

$profile = json_decode($imes->fetchStudent($sid), true);
$company = json_decode($imes->fetchCompanyConnected($sid), true);
$requiredHours = $profile['reqHours'];
$appriasal_criterias = json_decode($imes->fetchAppraisalCriteria(), true);
$studentAppraisal = json_decode($imes->fetchStudentAppraisal($sid), true);
$studentOverview = json_decode($imes->fetchStudentOverview($sid), true);

$supervisorRate = isset($studentOverview[2]['rate']) ? $studentOverview[2]['rate'] : 0;
$coordinatorRate = isset($studentOverview[3]['rate']) ? $studentOverview[3]['rate'] : 0;
$coordinator = $studentOverview[1]['evaluator'];
$finalGrade = 0;
if ($supervisorRate > 0 & $coordinatorRate > 0) {
	$finalGrade = ($supervisorRate + $coordinatorRate) / 2;	
}


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('IMES');
$pdf->SetAuthor('IMES');
$pdf->SetTitle('APPRAISAL REPORT');
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
$pdf->SetMargins(5, 10, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// $pdf->SetAutoPageBreak(true, 0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('', '', 10);
$image = '../_uploads/official-logo.png';
// add a page
$pdf->AddPage();

$criteriaOne = generateCriteria($appriasal_criterias, 1, $studentAppraisal);
$criteriaTwo = generateCriteria($appriasal_criterias, 2, $studentAppraisal);
$criteriaThree = generateCriteria($appriasal_criterias, 3, $studentAppraisal);

$html = '
<table border="1" cellpadding="5" style="font-size:8pt;">
    <tr>
    	<td style="text-align:center;"><img src="'.$image.'" width="40" /></td>
    	<td colspan="4"><p><br>Reference No.: BatStateU-FO-OJT-03</p></td>
    	<td colspan="3"><p><br>Effectivity Date: August 8, 2018</p></td>
    	<td colspan="2"><p><br>Revision No.: 00</p></td>
    </tr>
    <tr>
    	<td style="text-align:center; font-size:10pt;" colspan="10"><b><br>STUDENT-TRAINEE’S PERFORMANCE APPRAISAL REPORT</b><br></td>
    </tr>
    <tr>
    	<td colspan="5"><b>Student Trainee/ Program/ Year Level:</b><br>'.$profile['fullname'].'</td>
    	<td colspan="5"><b>Name of Company:</b><br>'.$company['compName'].'</td>
    </tr>
    <tr>
    	<td colspan="5"><b>Semester/ No. of Training Hours:</b><br>2nd Semester/'.$requiredHours.' hours</td>
    	<td colspan="5"><b>Address of Company:</b><br>'.$company['compAddress'].'</td>
    </tr>
    <tr>
    	<td colspan="10"><b>Part I – DIRECTION:</b> Please rate by checking the appropriate column that best describes the performance of the above student trainee. Please use the ratings as follows: Five (5) being the highest and one (1) the lowest.
    	</td>
    </tr>
    <tr>
    	<td style="text-align:center" colspan="5"><b>CRITERIA</b></td>
    	<td style="text-align:center"><b>5</b></td>
    	<td style="text-align:center"><b>4</b></td>
    	<td style="text-align:center"><b>3</b></td>
    	<td style="text-align:center"><b>2</b></td>
    	<td style="text-align:center"><b>1</b></td>
    </tr>
    <tr><td colspan="10"><b>ATTENDANCE & PUNCTUALITY</b></td></tr>
    '.$criteriaOne.'
    <tr><td colspan="10"><b>PERFORMANCE</b></td></tr>
    '.$criteriaTwo.'
    <tr><td colspan="10"><b>GENERAL ATTITUDE</b></td></tr>
    '.$criteriaThree.'
    <tr>
    	<td colspan="8" style="text-align:right; border-right-color:white"><b>TOTAL POINTS:</b></td>
    	<td colspan="2" style="border-left-color:white">'.$studentOverview[2]['rate'].'</td>
    </tr>
    <tr>
    	<td colspan="10"><b>COMMENT/SUGGESTIONS:</b><br>'.$studentAppraisal[21].'</td>
    </tr>
    <tr>
    	<td colspan="6" style="border-right-color:white"></td>
    	<td colspan="4" style="text-align:center; border-left-color:white"><b>Rated by:</b> <br><br><u>'.$studentOverview[2]['supervisor'].'</u><br><b>Training Supervisor</b></td>
    </tr>
    <tr>
    	<td colspan="10"><b>Part II – To be accomplished by the OJT Coordinator:</b>
    	</td>
    </tr>
    <tr>
    	<td colspan="6"><b>Name of student –trainee:</b></td>
    	<td colspan="4"><b>Course/Year:</b><br></td>
    </tr>
    <tr nobr="true">
    	<td colspan="6"><b>Name of Company:</b></td>
    	<td colspan="2"><b>Semester:</b><br></td>
    	<td colspan="2"><b>S.Y:</b><br></td>
    </tr>
    <tr nobr="true">
    	<td nobr="true" colspan="8" style="border-right-color:white"><b>Part III – In-Plant Performance Appraisal _________________________________________________________________<br>OJT Coordinator Performance Appraisal and other requirements ____________________________________________</b>
    	</td>
    	<td nobr="true" colspan="2" style="border-left-color:white; text-align:left;"><b>60% = <u></u><br> 40% = <u></u><br>100% :Total <br>Final Grade: <u></u></b></td>
    </tr>
    <tr>
    	<td colspan="10"><b>Rating Scale:</b><br><br>
    	<table>
    		<tr>
    			<td style="text-align:center"><b>Numerical Grade</b></td>
    			<td style="text-align:center"><b>Equivalent</b></td>
    			<td style="text-align:center"><b>Adjectival Grade</b></td>
    			<td style="text-align:center"><b>Numerical Grade</b></td>
    			<td style="text-align:center"><b>Equivalent</b></td>
    			<td style="text-align:center"><b>Adjectival Grade</b></td>
    		</tr>
    		<tr>
    			<td style="text-align:center">1.00</td>
    			<td style="text-align:center">98-100</td>
    			<td style="text-align:center">Excellent</td>
    			<td style="text-align:center">2.75</td>
    			<td style="text-align:center">78-79</td>
    			<td style="text-align:center">Fairly Satisfactory</td>
    		</tr>
    		<tr>
    			<td style="text-align:center">1.25</td>
    			<td style="text-align:center">94-97</td>
    			<td style="text-align:center">Superior</td>
    			<td style="text-align:center">3.00</td>
    			<td style="text-align:center">75-77</td>
    			<td style="text-align:center">Passing</td>
    		</tr>
    		<tr>
    			<td style="text-align:center">1.50</td>
    			<td style="text-align:center">90-93</td>
    			<td style="text-align:center">Very Good</td>
    			<td style="text-align:center">4.00</td>
    			<td style="text-align:center">70-74</td>
    			<td style="text-align:center">Conditional Failure</td>
    		</tr>
    		<tr>
    			<td style="text-align:center">1.75</td>
    			<td style="text-align:center">88-89</td>
    			<td style="text-align:center">Meritorious</td>
    			<td style="text-align:center">5.00</td>
    			<td style="text-align:center">Below 70</td>
    			<td style="text-align:center">Failure</td>
    		</tr>
    		<tr>
    			<td style="text-align:center">2.00</td>
    			<td style="text-align:center">85-87</td>
    			<td style="text-align:center">Very Satisfactory</td>
    			<td style="text-align:center">Inc</td>
    			<td style="text-align:center"></td>
    			<td style="text-align:center">Incomplete</td>
    		</tr>
    		<tr>
    			<td style="text-align:center">2.50</td>
    			<td style="text-align:center">80-82</td>
    			<td style="text-align:center">Satisfactory</td>
    			<td style="text-align:center">Drp</td>
    			<td style="text-align:center"></td>
    			<td style="text-align:center">Dropped</td>
    		</tr>
    	</table>
    	</td>
    </tr>
    <tr>
    	<td colspan="10" style="text-align:center"><b>Rater:</b><br><br><br><u>'.$coordinator.'</u><br>OJT Coordinator</td>
    </tr>
</table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->lastPage();
$pdf->Output('appraisal_report.pdf', 'I');


function generateCriteria($appriasal_criterias, $type, $studentAppraisal) 
{
	$tr = '';
	foreach ($appriasal_criterias[$type] as $key => $criteria) {
		$tr.= '<tr>';
		$tr.= '<td colspan="5">';
		$tr.= $criteria['order'].'. '.$criteria['name'];
		$tr.= '</td>';
		$tr.= '<td style="text-align:center">';
			if ($studentAppraisal[$criteria['id']] == 5) {
				$tr.= '<span style="font-family:zapfdingbats;">3</span>';	
			}
		$tr.= '</td>';
		$tr.= '<td style="text-align:center">';
			if ($studentAppraisal[$criteria['id']] == 4) {
				$tr.= '<span style="font-family:zapfdingbats;">3</span>';	
			}
		$tr.= '</td>';
		$tr.= '<td style="text-align:center">';
			if ($studentAppraisal[$criteria['id']] == 3) {
				$tr.= '<span style="font-family:zapfdingbats;">3</span>';	
			}
		$tr.= '</td>';
		$tr.= '<td style="text-align:center">';
			if ($studentAppraisal[$criteria['id']] == 2) {
				$tr.= '<span style="font-family:zapfdingbats;">3</span>';	
			}
		$tr.= '</td>';
		$tr.= '<td style="text-align:center">';
			if ($studentAppraisal[$criteria['id']] == 1) {
				$tr.= '<span style="font-family:zapfdingbats;">3</span>';	
			}
		$tr.= '</td>';
		$tr.= '</tr>';
	}

	return $tr;
}