<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/SchoolInformation.php';
require_once '../model/Profile.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// SCHOOL DETAILS
	$userId = isset($_POST['userId']) ? $_POST['userId'] : '';
	$section = isset($_POST['section']) ? $_POST['section'] : '';
	$schoolProgram = isset($_POST['schoolProgram']) ? $_POST['schoolProgram'] : '';
	$schoolCoordinator = isset($_POST['schoolCoordinator']) ? $_POST['schoolCoordinator'] : '';
	$schoolHead = isset($_POST['schoolHead']) ? $_POST['schoolHead'] : '';
	
	$school = new SchoolInformation();
	$school->setUserId($userId);
	$school->setProgram($schoolProgram);
	$school->setOjtCoordinator($schoolCoordinator);
	$school->setOjtHead($schoolHead);
	$school->setSection($section);

	if ($school->find()) {
		$school->update();
	} else {
		$school->save();
	}

	$school->updateProfileSection();
	
	$notif = new Notification;
	$notif->setUserId($school->uid);
	$notif->setMessage('Success updated student information.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../profile.php');
} else {

}