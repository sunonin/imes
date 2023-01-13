<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

include 'verify_session.php';

$imes = new ImesManager();
if (isset($_GET['id'])) {
	$route = $imes->route.'put-school.php';
	$school = json_decode($imes->fetchSchool($_GET['id']), true);
	$programs = json_decode($imes->fetchPrograms(), true);
	$departments = json_decode($imes->fetchDepartments(), true);
	$company = json_decode($imes->fetchCompanies(), true);
	$tableData = json_decode($imes->fetchSchoolData(), true);
} else {
	$schools[] = json_decode($imes->fetchSchool(), true);
	$route = $imes->route.'post-school.php';
}