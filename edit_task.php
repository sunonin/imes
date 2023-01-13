<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php if ($_SESSION['user']['role_id'] == 3): ?>
    <?php include('controller/SupervisorController.php'); ?>
    <?php include('views/supervisor/edit-activity.php'); ?>
    <?php include('views/supervisor/_approve-modal.php'); ?>
  <?php else: ?>
    <?php include('controller/ProfileController.php'); ?>
    <?php include('views/student/edit_activity.php'); ?>
  <?php endif ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>