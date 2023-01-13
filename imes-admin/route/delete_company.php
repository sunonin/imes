<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';
require_once '../model/Company.php';
require_once '../model/Supervisor.php';
require_once '../model/User.php';
require_once '../model/Notification.php';


$method = $_SERVER['REQUEST_METHOD'];

// only accept GET method
if ($method == 'POST') {
	if (isset($_POST['comp_id'])) {
		$company = new Company();
		$company->id = $_POST['comp_id'];

		$supervisor = new Supervisor();
		$supervisor->setCompany($company->id);

		$supervisor->delete();
		
		$company->delete();

		$notif = new Notification;
		$notif->setUserId($_POST['user_id']);
		$notif->setMessage('Company has been deleted successfully.');
		$notif->setType('success');
		$notif->setHeader('Delete');
		$notif->setCreatedAt(date('Y-m-d'));

		$_SESSION['toastr'] = json_encode($notif);
		header('location:../company.php');
	}
	
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}

echo json_encode($response);	