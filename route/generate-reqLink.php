<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/Avatar.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';
require_once '../model/SchoolInformation.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$userId = $_SESSION['user']['id'];

	$profile = new Profile();
	$profile->setUserID($userId);
	$profile->setRequest(true);
	$profile->setUpdatedAt(date('Y-m-d'));

	$profile->insertReq();
	
	$notif = new Notification;
	$notif->setUserId($userId);
	$notif->setMessage('User has been created successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../post-ojt-requirements.php');
} else {

}