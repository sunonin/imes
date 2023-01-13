<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Department.php';
require_once '../model/StudentConnection.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$sid = isset($_POST['sid']) ? $_POST['sid'] : '';
	
	$connection = new StudentConnection();
	$connection->setStudentId($sid);

	$connection->delete();

	$notif = new Notification;
	$notif->setUserId($connection->sid);
	$notif->setMessage('Successfully reopen the submissiong of Pre-OJT Requirements.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../student_connection.php?id='.$connection->sid.'&con');
} else {

}