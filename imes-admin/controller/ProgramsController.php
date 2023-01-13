<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

include 'verify_session.php';

$imes = new ImesManager();
$department_opts = json_decode($imes->fetchDeptOpts(), true);

if (isset($_GET['id'])) {
	$route = $imes->route.'put-program.php';
	$program = json_decode($imes->fetchPrograms($_GET['id']), true);
	$supervisor_opts = json_decode($imes->fetchSupervisors(3, 3), true);
} else {
	$programs = json_decode($imes->fetchPrograms(), true);
	$route = $imes->route.'post-program.php';
}