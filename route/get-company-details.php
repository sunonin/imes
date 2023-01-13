<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

// only accept GET method
if ($method == 'GET') {
	$imes = new ImesManager;
	$response = array('type'=> 1, 'data'=>$imes->fetchCompany($_GET['dd']));
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}

echo json_encode($response);	