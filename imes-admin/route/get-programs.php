<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

// only accept GET method
if ($method == 'GET') {
	$imes = new ImesManager;

	if (isset($_GET['dd'])) {
		$data = explode('/', $_GET['dd']);
    	$type = trim(str_replace('get', '', $data[1]));

		switch($type) {
			case 'prv':
				$response = array('type'=> 1, 'data'=>$imes->fetchCityMuns($data[0]));
				break;
		}	
	}
	
} else {
	$response = ['type'=> 0, 'msg'=>'No access'];
}

echo json_encode($response);	