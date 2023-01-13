<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Department.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// SCHOOL DETAILS
	$departmentId = isset($_POST['departmentId']) ? $_POST['departmentId'] : '';
	$departmentTitle = isset($_POST['departmentTitle']) ? $_POST['departmentTitle'] : '';
	$departmentDean = isset($_POST['departmentDean']) ? $_POST['departmentDean'] : '';
	$departmentPhone = isset($_POST['departmentPhone']) ? $_POST['departmentPhone'] : '';
	$departmentEmail = isset($_POST['departmentEmail']) ? $_POST['departmentEmail'] : '';
	
	$department = new Department();
	$department->setDepartmentId($departmentId);
	$department->setDepartmentTitle($departmentTitle);
	$department->setDepartmentDean($departmentDean);
	$department->setDepartmentPhone($departmentPhone);
	$department->setDepartmentEmail($departmentEmail);

	$department->update();

	$notif = new Notification;
	$notif->setUserId($department->id);
	$notif->setMessage('Department has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);

	header('location:../department_edit.php?id='.$department->id);
} else {

}