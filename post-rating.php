<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php if ($_SESSION['user']['role_id'] == 3): ?>
    <?php include('controller/SupervisorController.php'); ?>
    <?php include('views/supervisor/post-requirements.php'); ?>
    <?php include('views/supervisor/_post-evaluate-hours.php'); ?>
  <?php else: ?>
    <?php include('controller/ProfileController.php'); ?>
    <?php include('views/student/post-requirements.php'); ?>
    <?php include('views/student/_notes.php'); ?>
  <?php endif ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>

<style type="text/css">
  .custom-border {
    border-bottom: 1.5px solid #dcdcdc;
  }

</style>

<script type="text/javascript">
  $("#tb-journal").dataTable({});


  $(document).on('click', '.postEvaluate', function(e){
    let sid = $(this).data('id');
    let path = "route/post-overview-hours.php";

    $('#postEvaluate').find('#sid').val(sid);
  });

</script>