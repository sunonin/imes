<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/StudentHistory.php';
require_once '../model/Avatar.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;
	$profile = new Profile;

	$userId = isset($_POST['userId']) ? $_POST['userId'] : '';
	$fatherName = isset($_POST['fatherName']) ? $_POST['fatherName'] : '';
	$fatherOccupation = isset($_POST['fatherOccupation']) ? $_POST['fatherOccupation'] : '';
	$motherName = isset($_POST['motherName']) ? $_POST['motherName'] : '';
	$motherOccupation = isset($_POST['motherOccupation']) ? $_POST['motherOccupation'] : '';
	$parentsAddress = isset($_POST['parentsAddress']) ? $_POST['parentsAddress'] : '';
	$parentsMobile = isset($_POST['parentsMobile']) ? $_POST['parentsMobile'] : '';
	$guardiansName = isset($_POST['guardiansName']) ? $_POST['guardiansName'] : '';
	$guardiansMobile = isset($_POST['guardiansMobile']) ? $_POST['guardiansMobile'] : '';
	$emergencyContact = isset($_POST['emergencyContact']) ? $_POST['emergencyContact'] : '';

	$history = new StudentHistory;
	$history->setUserID($userId);
	$history->setFatherName($fatherName);
	$history->setFatherOccupation($fatherOccupation);
	$history->setMotherName($motherName);
	$history->setMotherOccupation($motherOccupation);
	$history->setParentsAddress($parentsAddress);
	$history->setParentsMobile($parentsMobile);
	$history->setGuardianName($guardiansName);
	$history->setGuardianMobile($guardiansMobile);
	$history->setEmergencyContact($emergencyContact);

	$history->updateCustom();


	$notif = new Notification;
	$notif->setUserId($history->id);
	$notif->setMessage('User has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../profile.php');

}