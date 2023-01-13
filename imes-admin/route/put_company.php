<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Company.php';
require_once '../model/Supervisor.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	// COMPANY DETAILS
	$compId = isset($_POST['companyId']) ? $_POST['companyId'] : '';
	$compName = isset($_POST['compName']) ? $_POST['compName'] : '';
	$compType = isset($_POST['compType']) ? $_POST['compType'] : '';
	$compEmail = isset($_POST['compEmail']) ? $_POST['compEmail'] : '';
	$compPhone = isset($_POST['compPhone']) ? $_POST['compPhone'] : '';
	$compAddress = isset($_POST['compAddress']) ? $_POST['compAddress'] : '';
	
	// SUPERVISOR DETAILS
	$supervisorName = isset($_POST['supervisorName']) ? $_POST['supervisorName'] : '';
	$supervisorPosition = isset($_POST['supervisorPosition']) ? $_POST['supervisorPosition'] : '';
	$supervisorDepartment = isset($_POST['supervisorDepartment']) ? $_POST['supervisorDepartment'] : '';
	$supervisorEmail = isset($_POST['supervisorEmail']) ? $_POST['supervisorEmail'] : '';
	$supervisorPhone = isset($_POST['supervisorPhone']) ? $_POST['supervisorPhone'] : '';
	
	$company = new Company();
	$company->setCompanyId($compId);
	$company->setCompanyName($compName);
	$company->setCompanyType($compType);
	$company->setCompanyEmail($compEmail);
	$company->setCompanyPhone($compPhone);
	$company->setCompanyAddress($compAddress);
	$company->setUpdatedAt(date('Y-m-d'));

	$company->update();

	$supervisor = new Supervisor();
	$supervisor->setCompany($company->id);
	$supervisor->setSupervisor($supervisorName);
	$supervisor->setSupervisorPosition($supervisorPosition);
	$supervisor->setSupervisorDepartment($supervisorDepartment);
	$supervisor->setSupervisorEmail($supervisorEmail);
	$supervisor->setSupervisorPhone($supervisorPhone);

	$supervisor->update();

	$notif = new Notification;
	$notif->setUserId($company->id);
	$notif->setMessage('Company has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../company_edit.php?id='.$company->id);
} else {

}