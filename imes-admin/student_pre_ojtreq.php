<?php 
session_start();

require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php require_once 'controller/StudentActivityController.php' ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/student_activity/pre_ojt.php'); ?>
  <?php include('views/student_activity/_pre_ojt_approval.php'); ?>
  <?php include('views/student_activity/_pre_ojt_evaluate.php'); ?>
  <?php include('views/student_activity/_pre_ojt_eval_reopen.php'); ?>
<?php endblock() ?>

<?php include('views/student_activity/app.js'); ?>
