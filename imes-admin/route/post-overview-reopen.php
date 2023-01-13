<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Department.php';
require_once '../model/StudentOverview.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$sid = isset($_POST['sid']) ? $_POST['sid'] : '';
	$type = isset($_POST['type']) ? $_POST['type'] : '';
	$evaluator = $_SESSION['user']['id'];
	
	$overview = new StudentOverview();
	$overview->setSid($sid);
	$overview->reopen();

	$overview->delete();

	$notif = new Notification;
	$notif->setUserId($overview->sid);
	$notif->setMessage('Successfully reopen the submissiong of Pre-OJT Requirements.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../student_pre_ojtreq.php?id='.$sid.'&pr');
} else {

}