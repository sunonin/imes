<?php 
session_start();
require_once 'init.php';
include 'public/base.php';
?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/CompanyController.php'); ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/company/form.php'); ?>
<?php endblock() ?>

<?php startblock('custom-js') ?>
  <?php include('views/company/app.js'); ?>
<?php endblock() ?>