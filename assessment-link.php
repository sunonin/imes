<?php 
session_start();
date_default_timezone_set('Asia/Manila');
require_once 'init.php';

include 'public/assessment.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/AssessmentLinkController.php'); ?>
  <?php include('public/toastr.php'); ?>
  <?php include('views/assessment/index.php'); ?>
<?php endblock() ?>

<script type="text/javascript">

  function refreshCityMuns() {
    $('#citymun').empty();
    $('#citymun').append($('<option>', {value: '', text: '-- Please Select City/Municipality --'}));
  }

  function handleChangeProvince(e) {
    const prov = e.val();
        const path = 'route/get.php?dd='+prov+'/getprv';

        refreshCityMuns();
    $.get(path, function(result){
      const response = JSON.parse(result);
      if (response.type) {
        let citymuns = response.data;

        $.each(citymuns, function(key, val) {
          $('#citymun').append($('<option>', {value: key, text : val}));  
        });
      }
    });
  }

  function setElementValues(e) { 
    $("#schoolMajor").val(e.major);
    $("#schoolYear").val(e.year_level);
    $("#schoolProgramLength").val(e.length_of_program);
    $("#schoolDepartment").val(e.department);
    $("#schoolDean").val(e.dean);
    $("#schoolDeanNo").val(e.dean_phone);
  }

  function getTotalPoints() {
    let total = 0;
    $('#tbody-appraisal > tr .form-check-input:checked').each(function (i, e) {
      if($(this).is(':checked'))
        total = parseInt(total) + parseInt($(this).val());
    });

    $('#finalRate').val(total);
    return total;
  }


  $(document).ready(function(){

    $(document).on('change', '.form-check-input', function(e){
      getTotalPoints();
    });

    $(document).on('click', '#btn-delete-user', function(e){
      let id = $(this).data('id');
      let userId = $('#deleteUserModal').find("[name='user_id']");

      userId.val(id);
    });

    $(document).on('change', '#schoolProgram', function(e){
      let program = $(this).val();
          let path = 'route/get.php?dd='+program+'/getprg';


      $.get(path, function(result){
        const response = JSON.parse(result);
        if (response.type) {
          let data = JSON.parse(response.data);
          setElementValues(data);
        }
      });
    });

    $(document).on('change', '#schoolCoordinator', function(e){
      let mobile = $(this).find(':selected').data('mobile');
      $('#schoolCoordinatorNo').val(mobile);
    })

    $(document).on('change', '#schoolHead', function(e){
      let mobile = $(this).find(':selected').data('mobile');
      $('#schoolHeadNo').val(mobile);
    })

  })
</script>