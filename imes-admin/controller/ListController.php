<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';
  
include 'verify_session.php';

$imes = new ImesManager;

$mosOpts = $imes->getMonthOpts();
$defaultMos = isset($_GET['filterMonth']) ? date($_GET['filterMonth']) : date('m');
$defaultDate = isset($_GET['filterWeek']) ? date('Y-m-d', strtotime($_GET['filterWeek'])) : date('Y-m-d');

$begin  = date('Y-m-d', strtotime('first day of this month', strtotime($defaultDate)));
$end    = date('Y-m-d', strtotime('last day of this month', strtotime($defaultDate)));

$beginG  = new DateTime($begin);
$endG    = new DateTime($end);

$weekss = [];
$week = 1;
$currentDay = isset($_GET['filterWeek']) ? date('d', strtotime($defaultDate)) : date('d');
$currentWeek = '';
while ($beginG <= $endG) // Loop will work begin to the end date 
{
    if($beginG->format("D") == "Mon") //Check that the day is Sunday here
    {
        $weekss[$beginG->format("Y-m-d")] = 'Week '.$week++ .' ('.$beginG->format("D d").')';
    }

    if ($currentDay == $beginG->format("d")) {
   		end($weekss);
   		$currentWeek = key($weekss);
    }

    $beginG->modify('+1 day');
}

$daysOfWeek  = [
	date('l - d', strtotime('last sunday', strtotime($currentWeek))),
	date('l - d', strtotime($currentWeek)),
	date('l - d', strtotime('next tuesday', strtotime($currentWeek))),
	date('l - d', strtotime('next wednesday', strtotime($currentWeek))),
	date('l - d', strtotime('next thursday', strtotime($currentWeek))),
	date('l - d', strtotime('next friday', strtotime($currentWeek))),
	date('l - d', strtotime('next saturday', strtotime($currentWeek))),
];

$daysOfWeekB  = [
	date('Y-m-d', strtotime('last sunday', strtotime($currentWeek))),
	date('Y-m-d', strtotime('next saturday', strtotime($currentWeek))),
];

$daysOfWeekQ  = [
	date('Y-m-d', strtotime('last sunday', strtotime($currentWeek))) => null,
	date('Y-m-d', strtotime($currentWeek)) => null,
	date('Y-m-d', strtotime('next tuesday', strtotime($currentWeek))) => null,
	date('Y-m-d', strtotime('next wednesday', strtotime($currentWeek))) => null,
	date('Y-m-d', strtotime('next thursday', strtotime($currentWeek))) => null,
	date('Y-m-d', strtotime('next friday', strtotime($currentWeek))) => null,
	date('Y-m-d', strtotime('next saturday', strtotime($currentWeek))) => null,
];

$students = [];
$companies = json_decode($imes->fetchCompanies(), true);
$program_opts = json_decode($imes->fetchProgramOpts(), true);
$section_opts = [];

$filterSchoolYear = isset($_GET['filterSchoolYear']) ? $_GET['filterSchoolYear'] : '';
$filterCompany = isset($_GET['filterCompany']) ? $_GET['filterCompany'] : '';
$filterPrograms = isset($_GET['filterProgram']) ? $_GET['filterProgram'] : '';
$filterSections = isset($_GET['filterSection']) ? $_GET['filterSection'] : '';
$filterNames = isset($_GET['filterName']) ? $_GET['filterName'] : '';

$students = $imes->fetchStudents3($filterPrograms, $filterSections, $filterCompany, $daysOfWeekQ, $daysOfWeekB);

if (isset($_GET['filterCompany']) || isset($_GET['filterProgram']) || isset($_GET['filterSection'])) {
	if (!empty($filterPrograms)) {
		$section_opts = json_decode($imes->fetchProgramOpts2($filterPrograms), true);
	}
}
