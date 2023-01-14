<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/User.php';
require_once 'manager/ImesManager.php';

$imes = new ImesManager();
$students = json_decode($imes->fetchStudents(), true);
$journals = json_decode($imes->fetchJournals($_SESSION['user']['id']), true);

$dtr = json_decode($imes->fetchDailyTimeRecordCurrent($_SESSION['user']['id']), true);

if (isset($_SESSION['user']['id'])) {
	$student = json_decode($imes->fetchStudent($_SESSION['user']['id']), true);
	$studentTotalPercentage = json_decode($imes->fetchProfilePercentage($_SESSION['user']['id']), true);
	$studentPreOjtPercentage = json_decode($imes->fetchPreOjtPercentage($_SESSION['user']['id']), true);
	$preojt_reqs = json_decode($imes->fetchPreOjtReq($_SESSION['user']['id']), true);
	$school = json_decode($imes->fetchSchool(), true);
	$studentOverview = json_decode($imes->fetchStudentOverview($_SESSION['user']['id']), true);
	$companyConnected = json_decode($imes->fetchCompanyConnected($_SESSION['user']['id']), true);
	$workSched = json_decode($imes->fetchWorkSchedule($_SESSION['user']['id']), true);
	$dtrs = json_decode($imes->fetchDailyTimeRecord($_SESSION['user']['id']), true);

	$hasCompletedHours = json_decode($imes->fetchCompletedHours($_SESSION['user']['id']), true);
}
