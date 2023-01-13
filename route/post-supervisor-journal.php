<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Journal.php';
require_once '../model/StudentHistory.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$authorId = $_SESSION['user']['id'];
	$startDate = isset($_POST['startDate']) ? str_replace("T", " ", strtotime($_POST['startDate'])) : "";
	$traineeId = $_POST['trainee'];
	$activity = $_POST['activity'];

	$journal = new Journal;
	$journal->setStudentId($traineeId);
	$journal->setStartDate(date('Y-m-d H:i:s', $startDate));
	$journal->setDateCreated(date('Y-m-d H:i:s'));
	$journal->setTitle($activity);
	$journal->setCreatedBy($authorId);

	$journal->save();

	$notif = new Notification;
	$notif->setUserId($journal->id);
	$notif->setMessage('User has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../journal.php');

}