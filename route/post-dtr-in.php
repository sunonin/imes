<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/DailyTimeRecord.php';
require_once '../imes-admin/model/StudentWorkSchedule.php';
require_once '../manager/ImesManager.php';
require_once '../model/Notification.php';

$imes = new ImesManager;

$id = $_SESSION['user']['id'];

$sched = new StudentWorkSchedule;
$asd = $sched->find($id);

$today = date('Y-m-d');
$startTime = date('Y-m-d H:i:s', strtotime($today .' '. $asd['start']));
$status = 'on-time';

if (date('Y-m-d H:i:s') > $startTime) {
	$status = 'late';
}

$dtr = new DailyTimeRecord;
$dtr->setStudentId($id);
$dtr->setTimeIn(date('Y-m-d H:i:s'));
$dtr->setStatus($status);

$dtr->save();

$notif = new Notification;
$notif->setUserId($dtr->id);
$notif->setMessage('Daily Time Record has been updated.');
$notif->setType('success');
$notif->setHeader('Success');
$notif->setCreatedAt(date('Y-m-d'));

$notif->save();

$_SESSION['toastr'] = json_encode($notif);

echo 1;

