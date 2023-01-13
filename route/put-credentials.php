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

	$userId = isset($_POST['userId']) ? $_POST['userId'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$confirm_password = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

	// IF PASSWORD HAS BEEN SET
	if ($password == $confirm_password && (!empty($confirm_password))) {
		$pw_hashed = password_hash($password, PASSWORD_DEFAULT);
	} else { // IF NO PASSWORD DEFAULT USERNAME
		$pw_hashed = password_hash($username, PASSWORD_DEFAULT);
	}

	$user = new User();
	$user->setUserId($userId);
	$user->setUsername($username);
	$user->setPassword($pw_hashed);
	$user->setEmail($email);

	$user->update();
	$user->updateEmail();
	
	$notif = new Notification;
	$notif->setUserId($userId);
	$notif->setMessage('User has been created successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../profile.php');
} else {

}