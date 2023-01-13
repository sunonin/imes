<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/School.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// SCHOOL DETAILS
	$schoolName = isset($_POST['schoolName']) ? $_POST['schoolName'] : '';
	$schoolEmail = isset($_POST['schoolEmail']) ? $_POST['schoolEmail'] : '';
	$schoolPhone = isset($_POST['schoolPhone']) ? $_POST['schoolPhone'] : '';
	$schoolAddress = isset($_POST['schoolAddress']) ? $_POST['schoolAddress'] : '';
	
	$school = new School();
	$school->setSchoolName($schoolName);
	$school->setSchoolEmail($schoolEmail);
	$school->setSchoolPhone($schoolPhone);
	$school->setSchoolAddress($schoolAddress);

	$school->save();

	$notif = new Notification;
	$notif->setUserId($school->id);
	$notif->setMessage('Company has been created successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../school_edit.php?id='.$school->id);
} else {

}