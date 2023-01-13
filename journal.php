<?php 
session_start();
require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
<?php if ($_SESSION['user']['role_id'] == 3): ?>
  <?php include('controller/SupervisorController.php'); ?>
  <?php include('views/supervisor/journal.php'); ?>
<?php else: ?>
  <?php include('controller/ProfileController.php'); ?>
  <?php include('views/student/journal.php'); ?>
<?php endif ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>

<script type="text/javascript">
  $('#tb-journal').DataTable();
  // $('#datetimepicker1').datetimepicker();
</script>