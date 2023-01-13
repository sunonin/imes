<?php 
session_start();
require_once 'init.php';
include 'public/base.php';
?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/DashboardController.php'); ?>
  <?php include('views/dashboard/index.php'); ?>
<?php endblock() ?>