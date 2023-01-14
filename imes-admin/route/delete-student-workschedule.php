<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';
require_once '../model/StudentWorkSchedule.php';
require_once '../model/Notification.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
	if (isset($_GET['sid'])) {
		$sched = new StudentWorkSchedule();
		$sched->delete($_GET['sid']);

		$notif = new Notification;
		$notif->setUserId($_GET['sid']);
		$notif->setMessage('Department has been deleted successfully.');
		$notif->setType('success');
		$notif->setHeader('Delete');
		$notif->setCreatedAt(date('Y-m-d'));

		$_SESSION['toastr'] = json_encode($notif);

		header('location:../student_connection.php?id='.$_GET['sid'].'&con');
	}
	
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}	