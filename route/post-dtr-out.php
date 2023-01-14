<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/DailyTimeRecord.php';
require_once '../imes-admin/model/StudentWorkSchedule.php';
require_once '../manager/ImesManager.php';
require_once '../model/Notification.php';


$imes = new ImesManager;

$id = $_POST['id'];

$sched = new StudentWorkSchedule;
$asd = $sched->find($id);

$today = date('Y-m-d');
$startTime = date('Y-m-d H:i:s', strtotime($today .' '. $asd['end']));
$status = 'on-time';

if (date('Y-m-d H:i:s') < $startTime) {
	$status = 'early-out';
}

$dd = json_decode($imes->fetchDailyTimeRecordLimit($id), 2);
$as = date('H:i');
$hours = round((strtotime($as) - strtotime($dd['timeInRaw']))/3600, 1);

$dtr = new DailyTimeRecord;
$dtr->setDailyTimeRecord($id);
$dtr->setTimeOut(date('Y-m-d H:i:s'));
$dtr->setStatus($status);
$dtr->setHours($hours);

$dtr->update();

$notif = new Notification;
$notif->setUserId($dtr->id);
$notif->setMessage('Daily Time Record has been updated.');
$notif->setType('success');
$notif->setHeader('Success');
$notif->setCreatedAt(date('Y-m-d'));

$notif->save();

$_SESSION['toastr'] = json_encode($notif);

echo 1;

