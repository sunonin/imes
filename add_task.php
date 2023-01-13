<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
<?php if ($_SESSION['user']['role_id'] == 3): ?>
    <?php include('controller/SupervisorController.php'); ?>
  <?php include('views/supervisor/add-activity.php'); ?>
<?php else: ?>
  <?php include('controller/ProfileController.php'); ?>
  <?php include('views/student/add_activity.php'); ?>
<?php endif ?>

<?php endblock() ?>

<?php include('views/student/app.css'); ?>