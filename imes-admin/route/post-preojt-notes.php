<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Department.php';
require_once '../model/StudentPreOjtRequirements.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// SCHOOL DETAILS
	$preOjtRequirementsId = isset($_POST['preOjtRequirementsId']) ? $_POST['preOjtRequirementsId'] : '';
	$preOjtRequirementsStudentId = isset($_POST['preOjtRequirementsStudentId']) ? $_POST['preOjtRequirementsStudentId'] : '';
	$preOjtRequirementsNotes = isset($_POST['preOjtRequirementsNotes']) ? $_POST['preOjtRequirementsNotes'] : '';
	
	$preojt = new StudentPreOjtRequirements();
	$preojt->setId($preOjtRequirementsId);
	$preojt->setStudentId($preOjtRequirementsStudentId);
	$preojt->setNotes($preOjtRequirementsNotes);
	$preojt->setStatus(StudentPreOjtRequirements::STATUS_RETURNED);

	$preojt->update();

	$notif = new Notification;
	$notif->setUserId($preojt->id);
	$notif->setMessage('Successfully return requirement.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../student_pre_ojtreq.php?id='.$preojt->student_id.'&pr');
} else {

}