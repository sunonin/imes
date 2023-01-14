<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/StudentHistory.php';
require_once '../model/Avatar.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '';
	$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
	$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
	$middleName = isset($_POST['middleName']) ? $_POST['middleName'] : '';
	$extnName = isset($_POST['extnName']) ? $_POST['extnName'] : '';
	$age = isset($_POST['age']) ? $_POST['age'] : '';
	$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$disability = isset($_POST['disability']) ? $_POST['disability'] : '';
	$birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : '';
	$citizenship = isset($_POST['citizenship']) ? $_POST['citizenship'] : '';
	$civilStatus = isset($_POST['civilStatus']) ? $_POST['civilStatus'] : '';
	$birthPlace = isset($_POST['birthPlace']) ? $_POST['birthPlace'] : '';
	$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
	$provincialAddress = isset($_POST['provincialAddress']) ? $_POST['provincialAddress'] : '';
	$provincialPhone = isset($_POST['provincialPhone']) ? $_POST['provincialPhone'] : '';

	$profile = new Profile;
	$profile->setUserID($userId);
	$profile->setLastname($lastName);
	$profile->setFirstname($firstName);
	$profile->setMiddlename($middleName);
	$profile->setExtnName($extnName);
	$profile->setBirthDate(date('Y-m-d', strtotime($birthDate)));
	// $profile->setExactAddress($birthDate);
	$profile->setEmail('');
	$profile->setMobile($mobile);
	$profile->setGender($gender);
	$profile->setDisability($disability);
	$profile->setUpdatedAt(date('Y-m-d'));

	$profile->update();

	$history = new StudentHistory;
	$history->setUserID($userId);
	$history->setBirthPlace($birthPlace);
	$history->setCitizenship($citizenship);
	$history->setCivilStatus($civilStatus);
	$history->setProvincialAddress($provincialAddress);
	$history->setProvincialPhone($provincialPhone);

	if (!$history->find()) {
		$history->save();
	} else {
		$history->update();
	}

	if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['size'] > 0)) {

		$file = $_FILES['avatar'];

		$avatar = new Avatar();
		$avatar->setUserId($userId);
		$avatar->setFileName($file['name']);
		$avatar->setTempName($file['tmp_name']);
		$avatar->setFileSize($file['size']);
		$avatar->setFileType($file['type']);
		$avatar->setCreatedAt(date('Y-m-d'));

		$avatar->removeUpload();
		$avatar->delete();

		$avatar->save();
		$avatar->upload();
	}

	$notif = new Notification;
	$notif->setUserId($userId);
	$notif->setMessage('Profile has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../profile.php');

}