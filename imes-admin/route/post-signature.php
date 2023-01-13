<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/UserSignature.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

	if (isset($_FILES)) {
		$file = $_FILES['signature'];

		$avatar = new UserSignature();
		$avatar->setUserId($user_id);
		$avatar->setFileName($file['name']);
		$avatar->setTempName($file['tmp_name']);
		$avatar->setFileSize($file['size']);
		$avatar->setFileType($file['type']);

		$avatar->save();
		$avatar->upload();
	}

	$notif = new Notification;
	$notif->setUserId($user_id);
	$notif->setMessage('User has been created successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../user_edit.php?id='.$user_id);
} else {

}