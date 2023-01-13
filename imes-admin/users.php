<?php 
session_start();

require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php require_once 'controller/UsersController.php' ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/users/index.php'); ?>
  <?php include('views/users/_modal_deleteUser.php'); ?>
<?php endblock() ?>


<?php include('views/users/app.js'); ?>


