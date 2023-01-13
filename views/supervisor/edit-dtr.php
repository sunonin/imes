<div class="row text-end">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Dashboard</a>
      </li>
      <li class="breadcrumb-item">Daily Time Record List</li>
      <li class="breadcrumb-item active">Edit Daily Time Record</li>
    </ol>
  </nav>
</div>

<form method="POST" action="route/put-supervisor-journal.php">
  <div class="row mb-3">
    <div class="button-wrapper">
      <a href="daily_time_record.php?id=19" class="btn btn-secondary btn-block"><i class='bx bx-arrow-back'></i> Return to Daily Time Record List</a>
    </div>
  </div>

  <!-- content -->
  <?php include '_edit-dtr-form.php' ?>
  
</form>
