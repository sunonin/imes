<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/DailyTimeRecord.php';
require_once '../model/AbsentForm.php';
require_once '../imes-admin/model/StudentWorkSchedule.php';
require_once '../manager/ImesManager.php';
require_once '../model/Notification.php';

$imes = new ImesManager;

$id = $_SESSION['user']['id'];
$reason = $_POST['reason'];
$status = 'absent';

$file = $_FILES['attachment'];
$dateNow = date('Y-m-d H:i:s');

$overview = new AbsentForm;
$overview->setSid($id);
$overview->setReason($reason);
$overview->setDateTime($dateNow);
$overview->setFilename($file['name']);
$overview->setTempname($file['tmp_name']);
$overview->setFileSize($file['size']);
$overview->setFileType($file['type']);

$overview->save();	
$overview->upload();	

$dtr = new DailyTimeRecord;
$dtr->setStudentId($id);
$dtr->setTimeIn($dateNow);
$dtr->setStatus($status);

$dtr->save();

$notif = new Notification;
$notif->setUserId($dtr->id);
$notif->setMessage('Successfully filed for Leave of Absent.');
$notif->setType('success');
$notif->setHeader('Success');
$notif->setCreatedAt(date('Y-m-d'));

$notif->save();

$_SESSION['toastr'] = json_encode($notif);

header('location:../dashboard.php');

