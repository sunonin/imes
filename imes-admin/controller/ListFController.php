<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';
  
include 'verify_session.php';

$imes = new ImesManager;
$students = [];
$companies = json_decode($imes->fetchCompanies(), true);
$program_opts = json_decode($imes->fetchProgramOpts(), true);
$section_opts = [];

$filterSchoolYear = isset($_GET['filterSchoolYear']) ? $_GET['filterSchoolYear'] : date('Y');
$filterCompany = isset($_GET['filterCompany']) ? $_GET['filterCompany'] : '';
$filterPrograms = isset($_GET['filterProgram']) ? $_GET['filterProgram'] : '';
$filterSections = isset($_GET['filterSection']) ? $_GET['filterSection'] : '';
$filterNames = isset($_GET['filterName']) ? $_GET['filterName'] : '';


if (isset($_GET['filterSchoolYear']) || isset($_GET['filterCompany']) || isset($_GET['filterProgram']) || isset($_GET['filterSection'])) {
	if (!empty($filterPrograms)) {
		$section_opts = json_decode($imes->fetchProgramOpts2($filterPrograms), true);
	}

	$students = $imes->fetchStudents2($filterPrograms, $filterSections, $filterNames, $filterSchoolYear, $filterCompany);
} else {
	$students = $imes->fetchStudents2(null, null, null, date('Y'), null);
}
