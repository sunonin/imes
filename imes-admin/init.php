<?php 
require_once 'vendor/ti/ti.php'; 
require_once 'menuChecker.php';

$url = trim(str_replace('/imes/','',$_SERVER['REQUEST_URI']));
$menu = MenuChecker::getMenu($url);
$menuTitle = MenuChecker::getMenuTitle($url);