<?php
if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
  $notif = new Notification;
  $notif->setMessage('Please login to your account to continue');
  $notif->setType('danger');
  $notif->setHeader('Alert');
  $notif->setCreatedAt(date('Y-m-d'));

  $_SESSION['toastr'] = json_encode($notif);

  header('location:index.php');
}