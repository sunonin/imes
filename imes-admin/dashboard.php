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

<script type="text/javascript">
  $(document).ready(function(){
    
    $('#school_year').on('change', function(){
      let ss = $(this).val();
      let path = 'route/get-student-count.php?sy='+ss;

      $.get(path, function(result){
        $('.ttl-students').html(result);
      })

    });

  })
</script>