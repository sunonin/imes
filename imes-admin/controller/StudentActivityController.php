<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

include 'verify_session.php';

$imes = new ImesManager();
$students = json_decode($imes->fetchStudents(), true);
$companies = json_decode($imes->fetchCompanies(), true);
$program_opts = json_decode($imes->fetchProgramOpts(), true);
$section_opts = [];

if (isset($_GET['id'])) {
	$student = json_decode($imes->fetchStudent($_GET['id']), true);
	$studentTotalPercentage = json_decode($imes->fetchProfilePercentage($_GET['id']), true);
	$studentPreOjtPercentage = json_decode($imes->fetchPreOjtPercentage($_GET['id']), true);
	$schoolDetails = json_decode($imes->fetchSchoolInfo(), true);	
	$preOjtRequirements = json_decode($imes->fetchStudentPreOjtReq($_GET['id']), true);	
	$postOjtRequirements = json_decode($imes->fetchStudentPostOjtReq($_GET['id']), true);	
	$studentOverview = json_decode($imes->fetchStudentOverview($_GET['id']), true);	
	$companyConnected = json_decode($imes->fetchCompanyConnected($_GET['id']), true);
	$journals = json_decode($imes->fetchJournals($_GET['id']), true);
	$journals_completed = json_decode($imes->fetchJournalsCompleted($_GET['id']), true);
	$journal_count = count($journals);

	$cc = count($preOjtRequirements);
    $preOjtRequirementsPercentage = ($cc / 11) * 100;

}

$filterPrograms = isset($_GET['filterProgram']) ? $_GET['filterProgram'] : '';
$filterSections = isset($_GET['filterSection']) ? $_GET['filterSection'] : '';
$filterNames = isset($_GET['filterName']) ? $_GET['filterName'] : '';

if (isset($_GET['filterProgram']) || isset($_GET['filterSection']) || isset($_GET['filterName'])) {
	$section_opts = json_decode($imes->fetchProgramOpts2($filterPrograms), true);
	$students = json_decode($imes->fetchStudents2($filterPrograms, $filterSections, $filterNames), true);
}


