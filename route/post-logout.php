<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../model/Connection.php';
require_once '../model/Profile.php';
require_once '../model/User.php';
require_once '../model/Notification.php';
require_once '../manager/ImesManager.php';

$method = $_SERVER['REQUEST_METHOD'];

session_destroy();
header('location:../index.php');