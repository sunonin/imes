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

if ($method == 'GET') {
	if (isset($_GET['sy'])) {
		$imes = new ImesManager;

		$totalRegisteredStudents = json_decode($imes->fetchRegisteredUsers(2, $_GET['sy']), true);
		echo $totalRegisteredStudents;
	}
	
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}	