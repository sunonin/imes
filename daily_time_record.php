<?php 
session_start();
require_once 'init.php';
include 'public/base.php';

?>

<?php startblock('title') ?>Daily Time Record<?php endblock('title') ?>

<?php startblock('content') ?>
<?php if ($_SESSION['user']['role_id'] == 3): ?>
  <?php include('controller/SupervisorController.php'); ?>
  <?php include('views/supervisor/dtr.php'); ?>
<?php else: ?>
  <?php include('controller/ProfileController.php'); ?>
  <?php include('views/student/dtr.php'); ?>
<?php endif ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>

<script type="text/javascript">
  $('#tb-journal').DataTable();
  // $('#datetimepicker1').datetimepicker();
</script>