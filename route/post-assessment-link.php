<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/DailyTimeRecord.php';
require_once '../model/StudentAppraisal.php';
require_once '../manager/ImesManager.php';
require_once '../model/StudentOverview.php';
require_once '../model/AssessmentLink.php';
require_once '../model/Notification.php';

$imes = new ImesManager;

$sid = $_POST['sid'];
$cid = $_POST['cid'];
$supervisor = $_POST['supervisor'];
$position = $_POST['position'];

$criteriaOne = $_POST['criteriaOne'];
$criteriaTwo = $_POST['criteriaTwo'];
$criteriaThree = $_POST['criteriaThree'];
$finalRate = $_POST['finalRate'];
$comment = $_POST['comment'];

// ATTENDANCE & PUNCTUALITY
foreach ($criteriaOne[1] as $key => $criteria) {
	$appraisal = new StudentAppraisal;
	$appraisal->setUserId($sid);
	$appraisal->setCriteria($key);
	$appraisal->setRate($criteria);

	$appraisal->save();
}
// PERFORMANCE
foreach ($criteriaTwo[2] as $key => $criteria) {
	$appraisal = new StudentAppraisal;
	$appraisal->setUserId($sid);
	$appraisal->setCriteria($key);
	$appraisal->setRate($criteria);

	$appraisal->save();
}
// GENERAL ATTITUDE
foreach ($criteriaThree[3] as $key => $criteria) {
	$appraisal = new StudentAppraisal;
	$appraisal->setUserId($sid);
	$appraisal->setCriteria($key);
	$appraisal->setRate($criteria);

	$appraisal->save();
}
// SAVE COMMENTS
$appraisal = new StudentAppraisal;
$appraisal->setUserId($sid);
$appraisal->setCriteria(21); // default id
$appraisal->setRate($comment);

$appraisal->save();


$overview = new StudentOverview;
$overview->setSid($sid);
$overview->setTypeId(StudentOverview::TYPE_TOTALHOURS);
$overview->setFinalRate($finalRate);
$overview->setSupervisor($supervisor);
$overview->setPosition($position);
$overview->setDateCreated(date('Y-m-d H:i:s'));
$overview->saveAssessment();	

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

// header('location:../assessment-link.php?token='.$aid);
header('location:../assessment-link.php?id='.$sid.'&comp='.$cid);

