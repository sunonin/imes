<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

$imes = new ImesManager();
$lists = [];
$users = json_decode($imes->fetchUsers(), true);
$profile = $citymuns_opts = [];
$roles = json_decode($imes->fetchRoles(), true);
$route = 'route/post_user.php';
$province_opts = $imes->fetchProvinces();
$program_opts = json_decode($imes->fetchProgramOpts(), true);
$schoolDetails = json_decode($imes->fetchSchoolInfo(), true);	
$supervisor_opts = json_decode($imes->fetchSupervisorss('', 2), true);

if (isset($_GET['id']) && isset($_GET['comp'])) {
	$status = json_decode($imes->fetchAssessmentLink($_GET['id'], $_GET['comp']), true);
	$lists = json_decode($imes->fetchForAssessment($_GET['id'], $_GET['comp']), true);
}

