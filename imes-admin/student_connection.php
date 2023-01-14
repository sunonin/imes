<?php 
session_start();

require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php require_once 'controller/StudentActivityController.php' ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/student_activity/connection.php'); ?>
  <?php include('views/student_activity/_company_details.php'); ?>
  <?php include('views/student_activity/_work-schedule.php'); ?>
  <?php include('views/student_activity/_company-revoke.php'); ?>
<?php endblock() ?>

<?php include('views/student_activity/app.js'); ?>
