<?php 
session_start();
require_once 'init.php';

include 'public/base.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php if ($_SESSION['user']['role_id'] == 3): ?>
    <?php include('controller/SupervisorController.php'); ?>
    <?php include('public/toastr.php'); ?>
    <?php include('views/supervisor/edit-dtr.php'); ?>
    <?php include('views/supervisor/_approve-modal.php'); ?>
  <?php else: ?>
    <?php include('controller/ProfileController.php'); ?>
    <?php include('public/toastr.php'); ?>
    <?php include('views/student/edit-dtr.php'); ?>
  <?php endif ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>

<script type="text/javascript">

  $(document).ready(function(){
    clockUpdate();
    setInterval(clockUpdate, 1000);


    function clockUpdate() {
      var date = new Date();
      // $('.timer').css({'color': '#fff', 'text-shadow': '0 0 6px #ff0'});
      function addZero(x) {
        if (x < 10) {
          return x = '0' + x;
        } else {
          return x;
        }
      }

      function twelveHour(x) {
        if (x > 12) {
          return x = x - 12;
        } else if (x == 0) {
          return x = 12;
        } else {
          return x;
        }
      }

      var h = addZero(twelveHour(date.getHours()));
      var m = addZero(date.getMinutes());
      var s = addZero(date.getSeconds());
      var t = "AM"
      if (date.getHours() > 12) {
        t = "PM";
      }

      $('.customTimer').text(h + ':' + m + ':' + s + ' ' + t);
      $('.timer').text(h + ':' + m + ':' + s + ' ' + t)
    }

    $(document).on('click', "#timeOutAction", function(e){
      let path = "route/post-dtr-out.php";
      let id = $('#dtrId').val();
      let data = {
        'id' : id
      };
      $.post(path, data, function(result){
        if (result) {
          location.reload();
        }

      });
    });


  })
</script>