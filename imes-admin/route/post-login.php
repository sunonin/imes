<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$user = new User;
	$user->username = $username;
	$user->password = $password;
	
	if ($user->find()) {
		$_SESSION['user'] = $user->find();
		
		header('location:../dashboard.php');
	} else {
	    $notif = new Notification;
		$notif->setMessage('User cannot be found! Incorrect User or Password.');
		$notif->setType('danger');
		$notif->setHeader('Alert');
		$notif->setCreatedAt(date('Y-m-d'));

		$_SESSION['toastr'] = json_encode($notif);

		header('location:../index.php');
	}
}