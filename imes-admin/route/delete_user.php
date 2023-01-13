<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';
require_once '../model/Profile.php';
require_once '../model/Avatar.php';
require_once '../model/User.php';
require_once '../model/Notification.php';


$method = $_SERVER['REQUEST_METHOD'];

// only accept GET method
if ($method == 'POST') {
	if (isset($_POST['user_id'])) {
		$profile = new Profile();
		$profile->setUserID($_POST['user_id']);

		$avatar = new Avatar();
		$avatar->setUserId($profile->id);

		$avatar->delete();
	
		$user = new User();
		$user->setUserId($profile->id);	
		$user->delete();
		
		$profile->delete();

		$notif = new Notification;
		$notif->setUserId($_POST['user_id']);
		$notif->setMessage('User has been deleted successfully.');
		$notif->setType('success');
		$notif->setHeader('Delete');
		$notif->setCreatedAt(date('Y-m-d'));

		$_SESSION['toastr'] = json_encode($notif);
		header('location:../users.php');
	}
	
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}

echo json_encode($response);	