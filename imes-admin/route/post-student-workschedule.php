<?php
session_start();
date_default_timezone_set('Asia/Manila');


require_once '../model/Connection.php';
require_once '../model/StudentWorkSchedule.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$userId = $_POST['userId'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];

	$sched = new StudentWorkSchedule;
	$sched->setSid($userId);
	$sched->setStartTime($startTime);
	$sched->setEndTime($endTime);

	$sched->save();

	$notif = new Notification;
	$notif->setUserId($userId);
	$notif->setMessage('Company has been assigned.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d H:i:s'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../student_connection.php?id='.$userId.'&con');
}