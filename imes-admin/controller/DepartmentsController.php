<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

include 'verify_session.php';

$imes = new ImesManager();

if (isset($_GET['id'])) {
	$route = $imes->route.'put-department.php';
	$department = json_decode($imes->fetchDepartments($_GET['id']), true);
} else {
	$departments = json_decode($imes->fetchDepartments(), true);
	$route = $imes->route.'post-department.php';
}