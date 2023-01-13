<div class="row text-end">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Dashboard</a>
      </li>
      <li class="breadcrumb-item">Journal</li>
      <li class="breadcrumb-item active">Add Activity</li>
    </ol>
  </nav>
</div>

<form method="POST" action="route/post-supervisor-journal.php">
  <div class="row mb-3">
    <div class="button-wrapper">
      <a href="journal.php?id=19" class="btn btn-secondary btn-block"><i class='bx bx-arrow-back'></i> Return to Journal List</a>
    </div>
  </div>

  <!-- content -->
  <?php include '_activity-form.php' ?>
  
</form>
