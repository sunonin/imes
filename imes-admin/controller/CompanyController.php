<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';

include 'verify_session.php';

$imes = new ImesManager();
$supervisor_opts = json_decode($imes->fetchSupervisors('', 3), true);
$base_url="http://".$_SERVER['SERVER_NAME'];

if (isset($_GET['id'])) {
	$route = $imes->route.'put_company.php';
	$company = json_decode($imes->fetchCompany($_GET['id']), true);
} else {
	$companies = json_decode($imes->fetchCompanies(), true);
	$route = $imes->route.'post_company.php';
}