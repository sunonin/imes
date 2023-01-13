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

	$userId = $_SESSION['user']['id'];
	$activityId = $_POST['activity_id'];
	$startDate = isset($_POST['startDate']) ? str_replace("T", " ", strtotime($_POST['startDate'])) : "";
	$endDate = isset($_POST['endDate']) ? str_replace("T", " ", strtotime($_POST['endDate'])) : "";
	$activity = $_POST['activity'];
	$remarks = $_POST['remarks'];
	$status = $_POST['status'];

	$journal = new Journal;
	$journal->setJournalId($activityId);
	$journal->setStudentId($userId);
	$journal->setStartDate(date('Y-m-d H:i:s', $startDate));
	$journal->setEndDate(date('Y-m-d H:i:s', $endDate));
	$journal->setDateUpdated(date('Y-m-d H:i:s'));
	$journal->setTitle($activity);
	$journal->setRemarks($remarks);
	$journal->setStatus($status);

	$journal->update();

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