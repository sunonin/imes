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

	$activityId = $_POST['task'];
	$activityRate = $_POST['rateTask'];

	$journal = new Journal;
	$journal->setJournalId($activityId);
	$journal->setDateUpdated(date('Y-m-d H:i:s'));
	$journal->setApprovedBy($_SESSION['user']['id']);
	$journal->setRate($activityRate);
	$journal->setDateApproved(date('Y-m-d H:i:s'));
	
	$journal->complete();

	$notif = new Notification;
	$notif->setUserId($journal->id);
	$notif->setMessage('Activity has been completed successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../edit_task.php?task='.$activityId);

}