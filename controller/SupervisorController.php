<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/User.php';
require_once 'manager/ImesManager.php';

$imes = new ImesManager();

$comp = json_decode($imes->fetchSupervisor($_SESSION['user']['id']), true);
$journals = json_decode($imes->fetchJournalsSupervisor($_SESSION['user']['id'], $comp['compId']), true);
$completedJournals = json_decode($imes->fetchCompletedJournalsSupervisor($_SESSION['user']['id'], $comp['compId']), true);

$trainees = json_decode($imes->fetchJournalsSupervisorLimit($_SESSION['user']['id'], $comp['compId']), true);
$overviews = json_decode($imes->fetchOverallHours($_SESSION['user']['id'], $comp['compId']), true);
$overviewHours = $imes->fetchOverviewHours($_SESSION['user']['id'], $comp['compId']);


if (isset($_SESSION['user']['id'])) {
	$countEnrolledTrainee = json_decode($imes->fetchEnrolledTrainee($comp['compId']), true);
	$supervisor = json_decode($imes->fetchSupervisor($_SESSION['user']['id']), true);
	$dtrs = json_decode($imes->fetchDailyTimeRecordAll($_SESSION['user']['id'], $comp['compId']), true);
}

if (isset($_GET['task'])) {
	$journal = json_decode($imes->fetchJournal($_GET['task']), true);
}

if (isset($_GET['dtr'])) {
	$dtr = json_decode($imes->fetchDailyTimeRecordLimit($_GET['dtr']), true);
}