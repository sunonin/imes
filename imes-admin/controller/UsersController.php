<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

include 'verify_session.php';

$imes = new ImesManager();
$users = $imes->fetchUsers();
$profile = $citymuns_opts = [];
$roles = json_decode($imes->fetchRoles(), true);

if (isset($_GET['id'])) {
	$route = 'route/put_user.php';
	$profile = json_decode($imes->fetchUser($_GET['id']), true);
	$citymuns_opts = $imes->fetchCityMuns($profile['province']);
	$program_opts = json_decode($imes->fetchProgramOpts(), true);
	$schoolDetails = json_decode($imes->fetchSchoolInfo(), true);	
	$supervisor_opts = json_decode($imes->fetchSupervisors('', 2), true);
	$user_signature = json_decode($imes->fetchUserSignature($_GET['id'], 2), true);

} else {
	$route = 'route/post_user.php';
}

$province_opts = $imes->fetchProvinces();