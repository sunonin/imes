<?php 
session_start();
date_default_timezone_set('Asia/Manila');
require_once 'init.php';

include 'public/login.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/login/index.php'); ?>
<?php endblock() ?>