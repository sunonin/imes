<?php 
session_start();
require_once 'init.php';

include 'public/base.php';
?>

<?php startblock('content') ?>
    <?php include('controller/ProfileController.php'); ?>
    <?php include('public/toastr.php'); ?>
    <?php include('views/student/profile.php'); ?>
    <?php include('views/student/_company-details-modal.php'); ?>
<?php endblock() ?>

<?php startblock('title') ?>Profile<?php endblock('title') ?>

<?php include('views/student/app.css'); ?>

<script type="text/javascript">
  $('#tb-journal').DataTable();

  function setElementValues(e) { 
    $("#schoolMajor").val(e.major);
    $("#schoolYear").val(e.year_level);
    $("#schoolProgramLength").val(e.length_of_program);
    $("#schoolDepartment").val(e.department);
  }

  $(document).on('click', '.companyDetailsModal', function(e){
    let id = $(this).data('id');
    let path = 'route/get-company-details.php?dd='+id;

    $.get(path, function(result){
      const response = JSON.parse(result);
      if (response.type) {
        let dd = JSON.parse(response.data);

        $('#companyDetailsModal').find('#compId').val(id);
        $('#companyDetailsModal').find('.companyName').html(dd.compName);
        $('#companyDetailsModal').find('.companyAddress').html(dd.compAddress);
        $('#companyDetailsModal').find('.companyEmail').html(dd.compEmail);
        $('#companyDetailsModal').find('.companyPhone').html(dd.compPhone);
        $('#companyDetailsModal').find('.companyType').html(dd.compTypeText);
      }
    });
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


</script>