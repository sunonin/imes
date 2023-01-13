<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?>Pre-OJT Requirements<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/ProfileController.php'); ?>
  <?php include('views/student/pre_requirements.php'); ?>
  <?php include('views/student/_notes.php'); ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>

<style type="text/css">
  .custom-border {
    border-bottom: 1.5px solid #dcdcdc;
  }

</style>