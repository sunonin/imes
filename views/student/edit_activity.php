<div class="row text-end">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Dashboard</a>
      </li>
      <li class="breadcrumb-item">Journal List</li>
      <li class="breadcrumb-item active">Edit Activity</li>
    </ol>
  </nav>
</div>

<form method="POST" action="route/put-journal.php">
  <div class="row mb-3">
    <div class="button-wrapper">
      <a href="journal.php?id=19" class="btn btn-secondary btn-block"><i class='bx bx-arrow-back'></i> Return to Journal List</a>
    </div>
  </div>

  <!-- content -->
  <?php include '_edit_activity_form.php' ?>
  
</form>
