<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/SchoolInformation.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$id = $_POST['user_id'];
	$data = $_POST['userRole'];
	$role = isset($data[1]) ? 1 : (isset($data[2]) ? 2 : (isset($data[3]) ? 3 : (isset($data[4]) ? 4 : '') ));

	if ($role < 4) {
		$schoolInfo = new SchoolInformation;
		$schoolInfo->setUserId($id);
		$schoolInfo->delete();
	}

	$profile = new Profile;
	$profile->setUserID($id);
	$profile->setRole($role);
	$profile->setUpdatedAt(date('Y-m-d'));

	$profile->updateRole();

	$user = new User;
	$user->setUserID($id);

	$user->updateStatus();

	$notif = new Notification;
	$notif->setUserId($profile->id);
	$notif->setMessage('User role has been assigned successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../user_role.php?id='.$id);
} else {

}