<?php 
session_start();

require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php require_once 'controller/SchoolController.php' ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/school/form.php'); ?>
  <?php include('views/company/_modal_deleteCompany.php'); ?>
<?php endblock() ?>

<?php include('views/school/app.js'); ?>