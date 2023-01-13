<?php 
session_start();

require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php require_once 'controller/DepartmentsController.php' ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/departments/index.php'); ?>
  <?php include('views/departments/_modal-delete.php'); ?>
<?php endblock() ?>

<?php include('views/departments/app.js'); ?>