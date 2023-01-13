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

	$activityId = $_POST['activity_id'];
	$activity = $_POST['activity'];
	$remarks = $_POST['remarks'];

	$journal = new Journal;
	$journal->setJournalId($activityId);
	$journal->setDateUpdated(date('Y-m-d H:i:s'));
	$journal->setTitle($activity);
	$journal->setRemarks($remarks);
	
	$journal->updateTwo();

	$notif = new Notification;
	$notif->setUserId($journal->id);
	$notif->setMessage('User has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../edit_activity.php?task='.$activityId);

}