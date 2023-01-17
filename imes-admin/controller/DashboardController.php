<?php
date_default_timezone_set('Asia/Manila');

require_once 'model/Connection.php';
require_once 'model/Profile.php';
require_once 'model/User.php';
require_once 'model/Notification.php';
require_once 'manager/ImesManager.php';
  
include 'verify_session.php';

$imes = new ImesManager;

$year = date('Y');

$totalAccounts = count($imes->fetchUsers());
$totalRegisteredNoRole = json_decode($imes->fetchRegisteredUsers(0), true);
$totalRegisteredAccounts = json_decode($imes->fetchRegisteredUsers(1), true);

$totalRegisteredStudents = json_decode($imes->fetchRegisteredUsers(2, $year), true);

$totalRegisteredSupervisor = json_decode($imes->fetchRegisteredUsers(3), true);
$totalRegisteredCoordinator = json_decode($imes->fetchRegisteredUsers(4), true);
$totalPreRequirements = json_decode($imes->fetchPreRequirements(), true);
$totalPostRequirements = json_decode($imes->fetchPostRequirements(), true);
$companiesList = json_decode($imes->fetchCompanies(), true);
$companies = json_decode($imes->fetchCompaniesTwo(), true);
$totalPresent = json_decode($imes->fetchHeadCount(0), true);
$totalLate = json_decode($imes->fetchHeadCount(1), true);
$totalAbsent = json_decode($imes->fetchHeadCount(2), true);
$totalEarlyBird = json_decode($imes->fetchHeadCount(3), true);
$totalToday = json_decode($imes->fetchHeadCount(4), true);
$totalTodayPercentage = number_format(($totalToday / $totalRegisteredStudents) * 100, 0);

