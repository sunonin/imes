<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/Avatar.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$imes = new ImesManager;

	$userId = isset($_POST['userId']) ? $_POST['userId'] : '';
	$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
	$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
	$middleName = isset($_POST['middleName']) ? $_POST['middleName'] : '';
	$extnName = isset($_POST['extnName']) ? $_POST['extnName'] : '';
	$birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : '';
	$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
	$province = isset($_POST['province']) ? $_POST['province'] : '';
	$citymun = isset($_POST['citymun']) ? $_POST['citymun'] : '';
	$exactAddress = isset($_POST['exactAddress']) ? $_POST['exactAddress'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	
	$username = isset($_POST['userName']) ? $_POST['userName'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$confirm_password = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
	
	$profile = new Profile();
	$profile->setUserID($userId);
	$profile->setLastname($lastName);
	$profile->setFirstname($firstName);
	$profile->setMiddlename($middleName);
	$profile->setExtnName($extnName);
	$profile->setBirthDate(date('Y-m-d', strtotime($birthDate)));
	$profile->setExactAddress($exactAddress);
	$profile->setEmail($email);
	$profile->setMobile($mobile);
	$profile->setGender($gender);
	$profile->setProvince($province);
	$profile->setCityMun($citymun);
	$profile->setUpdatedAt(date('Y-m-d'));

	$profile->update();

	if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['size'] > 0)) {

		$file = $_FILES['avatar'];

		$avatar = new Avatar();
		$avatar->setUserId($profile->id);
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


	// IF PASSWORD HAS BEEN SET
	if ($password != "" && $confirm_password != "") {
	    if ($password == $confirm_password && (!empty($confirm_password))) {
    		$pw_hashed = password_hash($password, PASSWORD_DEFAULT);
    	} else { // IF NO PASSWORD DEFAULT USERNAME
    		$pw_hashed = password_hash($username, PASSWORD_DEFAULT);
    	}
	}

	$user = new User();
	$user->setUserId($profile->id);
	$user->setUsername($username);
	if ($password != "" && $confirm_password != "") {
	    $user->setPassword($pw_hashed);   
	}

	$user->update();

	$notif = new Notification;
	$notif->setUserId($profile->id);
	$notif->setMessage('User has been updated successfully.');
	$notif->setType('success');
	$notif->setHeader('Success');
	$notif->setCreatedAt(date('Y-m-d'));

	$notif->save();

	$_SESSION['toastr'] = json_encode($notif);
	header('location:../user_edit.php?id='.$profile->id);
} else {

}