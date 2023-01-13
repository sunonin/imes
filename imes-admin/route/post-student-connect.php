<?php
session_start();
date_default_timezone_set('Asia/Manila');


require_once '../model/Connection.php';
require_once '../model/School.php';
require_once '../model/StudentConnection.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$userId = $_POST['userId'];
	$compId = $_POST['compId'];

	$connection = new StudentConnection;
	$connection->setStudentId($userId);
	$connection->setCompId($compId);
	$connection->setCreatedAt(date('Y-m-d'));

	$connection->save();

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