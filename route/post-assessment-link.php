<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/DailyTimeRecord.php';
require_once '../manager/ImesManager.php';
require_once '../model/StudentOverview.php';
require_once '../model/AssessmentLink.php';
require_once '../model/Notification.php';

$imes = new ImesManager;

$rates = $_POST['rate'];
$sid = $_POST['sid'];
$cid = $_POST['cid'];
$supervisor = $_POST['supervisor'];
$position = $_POST['position'];

foreach ($rates as $key => $rate) {
	if ($rate != "" && !empty($rate)) {
		$overview = new StudentOverview;
		$overview->setSid($sid);
		// $overview->setCid($cid);
		$overview->setTypeId(StudentOverview::TYPE_TOTALHOURS);
		$overview->setFinalRate($rate);
		$overview->setSupervisor($supervisor);
		$overview->setPosition($position);
		$overview->setDateCreated(date('Y-m-d H:i:s'));

		$file = $_FILES['attachment'];

		$overview->setFilename($file['name']);
		$overview->setTempname($file['tmp_name']);
		$overview->setFileSize($file['size']);
		$overview->setFileType($file['type']);

		$overview->saveAssessment();	
		$overview->upload();	
	}
}

$link = new AssessmentLink;
$link->setUser($sid);
$link->setCompany($cid);
$link->setIsDone(true);
$link->setUpdatedAt(date('Y-m-d'));

$link->updateCustom();

$notif = new Notification;
$notif->setUserId($link->id);
$notif->setMessage('Successfully evaluated trainee.');
$notif->setType('success');
$notif->setHeader('Success');
$notif->setCreatedAt(date('Y-m-d'));

$notif->save();

$_SESSION['toastr'] = json_encode($notif);

header('location:../assessment-link.php?token='.$aid);

