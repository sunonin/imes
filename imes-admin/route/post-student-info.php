<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/SchoolInformation.php';
require_once '../model/Notification.php';
require_once '../model/Profile.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// SCHOOL DETAILS
	$userId = isset($_POST['userId']) ? $_POST['userId'] : '';
	$schoolSection = isset($_POST['schoolSection']) ? $_POST['schoolSection'] : '';
	$schoolProgram = isset($_POST['schoolProgram']) ? $_POST['schoolProgram'] : '';
	$schoolCoordinator = isset($_POST['schoolCoordinator']) ? $_POST['schoolCoordinator'] : '';
	$schoolHead = isset($_POST['schoolHead']) ? $_POST['schoolHead'] : '';

	$profile = new Profile();
	$profile->setUserID($userId);
	$profile->setSection($schoolSection);
	$profile->setUpdatedAt(date('Y-m-d'));
	$profile->updateSection();
	
	$school = new SchoolInformation();
	$school->setUserId($userId);
	$school->setProgram($schoolProgram);
	$school->setProgram($schoolProgram);
	$school->setOjtCoordinator($schoolCoordinator);
	$school->setOjtHead($schoolHead);

	$school->delete();
	$school->save();

	$notif = new Notification;
	$notif->setUserId($school->id);
	$notif->setMessage('Success added student information.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../student_information.php?id='.$school->uid);
} else {

}