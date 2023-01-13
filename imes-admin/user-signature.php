<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/UsersController.php'); ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/users/signatures.php'); ?>
<?php endblock() ?>