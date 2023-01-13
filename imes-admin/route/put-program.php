<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Department.php';
require_once '../model/Program.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// SCHOOL DETAILS
	$programId = isset($_POST['programId']) ? $_POST['programId'] : '';
	$programTitle = isset($_POST['programTitle']) ? $_POST['programTitle'] : '';
	$programCode = isset($_POST['programCode']) ? $_POST['programCode'] : '';
	$programMajor = isset($_POST['programMajor']) ? $_POST['programMajor'] : '';
	$programLength = isset($_POST['programLength']) ? $_POST['programLength'] : '';
	$programDepartment = isset($_POST['programDepartment']) ? $_POST['programDepartment'] : '';
	$programOjtHours = isset($_POST['programOjtHours']) ? $_POST['programOjtHours'] : '';
	
	$program = new Program();
	$program->setProgramId($programId);
	$program->setProgramTitle($programTitle);
	$program->setProgramCode($programCode);
	$program->setProgramMajor($programMajor);
	$program->setProgramLength($programLength);
	$program->setProgramDepartment($programDepartment);
	$program->setProgramOjtHours($programOjtHours);

	$program->update();

	$notif = new Notification;
	$notif->setUserId($program->id);
	$notif->setMessage('Program has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../program_edit.php?id='.$program->id);
} else {

}