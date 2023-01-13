<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Department.php';
require_once '../model/StudentOverview.php';
require_once '../model/Notification.php';
require_once '../model/AssessmentLink.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$comp_id = isset($_POST['comp_id']) ? $_POST['comp_id'] : '';
	// $token = bin2hex(openssl_random_pseudo_bytes(4));

	$overview = new AssessmentLink();
	$overview->setCompany($comp_id);
	$overview->setCreatedAt(date('Y-m-d'));
	$overview->save();

	$notif = new Notification;
	$notif->setUserId($overview->id);
	$notif->setMessage('Successfully generated Assessment Link');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../company.php');
} else {

}