<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../model/PreOjtRequirements.php';
require_once '../manager/ImesManager.php';

$id = $_SESSION['user']['id'];
$attachements = $_FILES;

foreach ($attachements as $key => $attachement) {
	foreach ($attachement['name'] as $key => $name) {
		if (!empty($name)) {

			$req = new PreOjtRequirements;
			$req->setStudentId($id);
			$req->setTypeId($key);	
			$req->setFileName($name);
			$req->setTempName($attachement['tmp_name'][$key]);
			$req->setFileSize($attachement['size'][$key]);
			$req->setFileType($attachement['type'][$key]);
			$req->setDateAccomplished(date('Y-m-d H:i:s'));

			$req->removeUpload();
			$req->delete();
			
			// if (!$req->find()) {
				$req->save();
				$req->upload();
			// }
		}
	}
}	

$notif = new Notification;
$notif->setUserId($id);
$notif->setMessage('Successfully added requirements');
$notif->setType('success');
$notif->setHeader('Success');
$notif->setCreatedAt(date('Y-m-d'));

$notif->save();

$_SESSION['toastr'] = json_encode($notif);
header('location:../pre_ojt_requirements.php');




