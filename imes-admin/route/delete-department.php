<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';
require_once '../model/Department.php';
require_once '../model/Supervisor.php';
require_once '../model/User.php';
require_once '../model/Notification.php';


$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	if (isset($_POST['departmentId'])) {
		$department = new Department();
		$department->id = $_POST['departmentId'];

		$department->delete();

		$notif = new Notification;
		$notif->setUserId($department->id);
		$notif->setMessage('Department has been deleted successfully.');
		$notif->setType('success');
		$notif->setHeader('Delete');
		$notif->setCreatedAt(date('Y-m-d'));

		$_SESSION['toastr'] = json_encode($notif);

		header('location:../departments.php');
	}
	
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}	