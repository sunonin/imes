<?php 
session_start();
require_once 'init.php';

include 'public/base.php';
?>

<?php startblock('title') ?>Dashboard<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/ProfileInitController.php'); ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/student/index.php'); ?>
<?php endblock() ?>

<?php include('views/student/app.css'); ?>

<script type="text/javascript">

  $(document).ready(function(){
    clockUpdate();
    setInterval(clockUpdate, 1000);


    function clockUpdate() {
      var date = new Date();
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

      // $('.customTimer').text(h + ':' + m + ':' + s + ' ' + t);
      $('.timer').text(h + ':' + m + ':' + s + ' ' + t)
    }

    $(document).on('click', "#timeInAction", function(e){
      let path = "route/post-dtr-in.php";
      $.post(path, function(result){
        if (result) {
          location.reload();
        }

      });
    });

    $(document).on('click', "#otInAction", function(e){
      let path = "route/post-dtr-ot-in.php";
      let id = $('#dtrId').val();
      let data = {
        'id' : id
      };
      $.post(path, data, function(result){
        // if (result) {
        //   location.reload();
        // }

      });
    });

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

    $(document).on('click', "#otOutAction", function(e){
      let path = "route/post-dtr-ot-out.php";
      let id = $('#dtrId').val();
      let data = {
        'id' : id
      };
      $.post(path, data, function(result){
        // if (result) {
        //   location.reload();
        // }

      });
    });


  })
</script>