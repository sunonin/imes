<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/ProfileController.php'); ?>
  <?php include('views/student/edit_activity.php'); ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>