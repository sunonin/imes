<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once 'model/Connection.php';
require_once 'model/User.php';
require_once 'manager/ImesManager.php';

$imes = new ImesManager();
$students = json_decode($imes->fetchStudents(), true);
$journals = json_decode($imes->fetchJournals($_SESSION['user']['id']), true);
$supervisor_opts = json_decode($imes->fetchSupervisorss('', 2), true);
$program_opts = json_decode($imes->fetchProgramOpts(), true);
$base_url="http://".$_SERVER['SERVER_NAME'];
$al = "";

if (isset($_SESSION['user']['id'])) {
	$student = json_decode($imes->fetchStudent($_SESSION['user']['id']), true);
	$studentTotalPercentage = json_decode($imes->fetchProfilePercentage($_SESSION['user']['id']), true);
	$studentPreOjtPercentage = json_decode($imes->fetchPreOjtPercentage($_SESSION['user']['id']), true);
	$preojt_reqs = json_decode($imes->fetchPreOjtReq($_SESSION['user']['id']), true);
	$postojt_reqs = json_decode($imes->fetchPostOjtReq($_SESSION['user']['id']), true);
	$school = json_decode($imes->fetchSchool(), true);
	$studentOverview = json_decode($imes->fetchStudentOverview($_SESSION['user']['id']), true);
	$companyConnected = json_decode($imes->fetchCompanyConnected($_SESSION['user']['id']), true);
	$dtrs = json_decode($imes->fetchDailyTimeRecord($_SESSION['user']['id']), true);
	
	if (isset($student['compId'])) {
	    $al = json_decode($imes->fetchMyAssessmentLink($_SESSION['user']['id'], $student['compId']), true);   
	}
}

if (isset($_GET['task'])) {
	$journal = json_decode($imes->fetchJournal($_GET['task']), true);
}

if (isset($_GET['dtr'])) {
	$dtr = json_decode($imes->fetchDailyTimeRecordLimit($_GET['dtr']), true);
}

$hasCompletedHours = json_decode($imes->fetchCompletedHours($_SESSION['user']['id']), true);

