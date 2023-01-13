<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/StudentOverview.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$sid = isset($_POST['sid']) ? $_POST['sid'] : '';
	$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
	$finalRate = isset($_POST['finalRate']) ? $_POST['finalRate'] : '';
	$evaluator = $_SESSION['user']['id'];
	
	$overview = new StudentOverview();
	$overview->setSid($sid);
	$overview->setTypeId(StudentOverview::TYPE_TOTALHOURS);
	$overview->setEvaluatedBy($evaluator);
	$overview->setRemarks($remarks);
	$overview->setFinalRate($finalRate);
	$overview->setDateCreated(date('Y-m-d H:i:s'));
	$overview->setDateUpdated(date('Y-m-d H:i:s'));

	$overview->save();

	$notif = new Notification;
	$notif->setUserId($overview->sid);
	$notif->setMessage('Successfully evaluated student.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../post-ojt-requirements.php');
} else {

}